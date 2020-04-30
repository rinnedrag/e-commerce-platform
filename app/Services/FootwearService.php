<?php


namespace App\Services;

use App\FootwearData;
use App\FootwearImage;
use App\FootwearMaterial;
use App\FootwearModelSize;
use DB;
use Str;

class FootwearService
{
    public function createFootwear($data) {
        $footwear_data = [
            'kind' => $data['footwearKind'],
            'gender' => $data['gender'],
            'fitting' => $data['fitting'],
            'season' => $data['season'],
            'brand' => $data['brand'],
            'clasp_kind' => $data['claspKind'],
            'heel_kind' => $data['heelKind'],
            'producer_country' => $data['producerCountry'],
            'description' => $data['description'],
            'price' => $data['price']
        ];
        $newModel = FootwearData::create($footwear_data);
        $newModel->photos = 'public/images/footwear/'.$newModel->id.'/';

        $images = collect([]);
        foreach ($data['colors'] as $color) {
            foreach ($color['sizes'] as $size) {
                $newModel->colorSizeCount()->create([
                    'footwear_id' => $newModel->id,
                    'color' => $color['color'],
                    'size' => $size['size'],
                    'count' => $size['count']
                ]);
            }
            foreach ($color['images'] as $image) {
                 $uuid = (string)Str::uuid().'.jpeg';
                 $path = $image->storeAs($newModel->photos.$color['color'], $uuid);
                 $images->push(['filename' => $uuid, 'color' => $color, 'footwear_id' => $newModel->id]);
            }
        }

        $newModel->images()->createMany($images);

        foreach ($data['materials'] as $material) {
            $newModel->materials()->create([
                'footwear_id' => $newModel->id,
                'component' => $material['component'],
                'material' => $material['material'],
                'percent' => $material['percent']/100
            ]);
        }
    }

    public function updateFootwear() {
        // TODO update footwear
    }

    public  function deleteFootwear() {
        // TODO delete footwear ?soft delete
    }

    public function getCatalog() {
        $images = FootwearImage::select(['model_id', DB::raw('MAX(filename) as filename')])->groupBy('model_id');
        return DB::table('footwear_models')->joinSub($images, 'images', function($join) {
            $join->on('footwear_models.id', '=', 'images.model_id');
        })->join('footwear_data', 'footwear_data.id','=','footwear_models.footwear_id')
            ->select('footwear_models.id','footwear_data.brand','footwear_data.kind',
                'footwear_models.price','footwear_models.color','images.filename')->get();
    }
}
