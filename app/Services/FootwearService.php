<?php


namespace App\Services;

use App\FootwearData;
use App\FootwearImage;
use App\FootwearMaterial;
use App\FootwearModel;
use App\FootwearModelSize;
use App\OrderProduct;
use DB;
use Image;
use Str;

class FootwearService
{
    public function createFootwear($data) {
        $footwearData = [
            'kind' => $data['footwearKind'],
            'gender' => $data['gender'],
            'fitting' => $data['fitting'],
            'season' => $data['season'],
            'brand' => $data['brand'],
            'clasp_kind' => $data['claspKind'],
            'heel_kind' => $data['heelKind'],
            'producer_country' => $data['producerCountry'],
            'description' => $data['description']
        ];
        $newModel = FootwearData::create($footwearData);

        $materials = collect([]);
        foreach ($data['materials'] as $material) {
            $materials->push([
                'footwear_id' => $newModel->id,
                'component' => $material['component'],
                'material' => $material['material'],
                'percent' => $material['percent']/100
            ]);
        }

        $newModel->materials()->createMany($materials);
        $path = 'public/images/footwear/';

        foreach ($data['colors'] as $color) {
            $footwearModel = FootwearModel::create([
                'footwear_id' => $newModel->id,
                'color' => $color['color'],
                'price' => $color['price']
            ]);

            $sizes = collect([]);
            foreach ($color['sizes'] as $size) {
                $sizes->push([
                    'model_id' => $footwearModel->id,
                    'size' => $size['size'],
                    'count' => $size['count']
                ]);
            }
            $footwearModel->sizes()->createMany($sizes);

            $images = collect([]);
            foreach ($color['images'] as $image) {
                 $uuid = (string)Str::uuid().'.jpeg';
                 $image->storeAs($path.$footwearModel->id, $uuid);

                 // open and resize an image file
                 $img = Image::make('storage/images/footwear/'.$footwearModel->id.'/'.$uuid)->resize(116, 116);
                 // save file as jpg with medium quality
                 $img->save('storage/images/footwear/'.$footwearModel->id.'/thumb-'.$uuid, 60);

                 $images->push(['filename' => $uuid, 'model_id' => $footwearModel->id]);
            }
            $footwearModel->images()->createMany($images);
        }

        return $newModel->id;
    }

    public function updateFootwear() {
        // TODO update footwear
    }

    public  function deleteFootwear() {
        // TODO delete footwear ?soft delete
    }

    public function getCatalog($filterParameters) {
        $images = FootwearImage::where('is_main', '=',true)->select(['model_id', 'filename']);
        $query = DB::table('footwear_models')->joinSub($images, 'images', function($join) {
            $join->on('footwear_models.id', '=', 'images.model_id');
        })->join('footwear_data', 'footwear_data.id','=','footwear_models.footwear_id')
            ->select('footwear_models.id','footwear_data.brand','footwear_data.kind',
                'footwear_models.price','footwear_models.color','images.filename');

        if (count($filterParameters) != 0) {
            $min_price = (float)$filterParameters->pull('min_price');
            $max_price = (float)$filterParameters->pull('max_price');

            if ($filterParameters->has('size')) {
                $sizes = $filterParameters->pull('size');
                $query = $query->whereRaw('footwear_models.id IN
                (SELECT model_id FROM footwear_model_sizes WHERE size IN (?))', [$sizes]);
            }

            foreach ($filterParameters as $key => $value) {
                $tableName = '';
                if (in_array($key, ['kind', 'heel_kind', 'clasp_kind', 'gender', 'season', 'fitting', 'brand'])) {
                    $tableName = 'footwear_data.';
                }
                if (in_array($key, ['color'])) {
                    $tableName = 'footwear_models.';
                }

                $query = $query->whereIn($tableName . $key, Str::of($value)->explode(',')->toArray());
            }

            $query = $query->whereBetween('footwear_models.price', [$min_price, $max_price]);
        }

        return $query;
    }

    public function getFootwearCart($cart) {
        $footwearIds = [];
        foreach ($cart as $id => $details) {
            array_push($footwearIds, $details['model']);
        }
        $images = FootwearImage::select(['model_id', DB::raw('MAX(filename) as filename')])->groupBy('model_id');
        return DB::table('footwear_models')->joinSub($images, 'images', function($join) {
            $join->on('footwear_models.id', '=', 'images.model_id');})
            ->select('footwear_models.price', 'footwear_models.id', 'images.filename')
            ->whereIn('id', $footwearIds)->get();
    }

    public function getFootwearDetailsForCheckout($cart) {
        $footwearIds = [];
        foreach ($cart as $id => $details) {
            array_push($footwearIds, $details['model']);
        }
        return FootwearModel::whereIn('footwear_models.id', $footwearIds)
            ->join('footwear_data', 'footwear_data.id', '=','footwear_models.footwear_id')
            ->select('footwear_models.id', 'footwear_models.price')->get();
    }

    public function getFootwearDetailsForOrder($id) {
        $images = FootwearImage::select(['model_id', DB::raw('MAX(filename) as filename')])->groupBy('model_id');
        return DB::table('order_products')->joinSub($images, 'images', function($join) {
            $join->on('order_products.product_id', '=', 'images.model_id');})
            ->join('footwear_models', 'footwear_models.id','=','order_products.product_id')
            ->join('footwear_data', 'footwear_data.id','=','footwear_models.footwear_id')
            ->select('images.filename', 'order_products.*', 'footwear_models.color',
            'footwear_data.kind', 'footwear_data.brand')
            ->where('order_products.order_id',  $id)->get();
    }
}
