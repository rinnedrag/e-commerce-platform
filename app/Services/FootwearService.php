<?php


namespace App\Services;

use App\Footwear;
use App\FootwearMaterial;
use App\FootwearColorSize;
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
        $newModel = Footwear::create($footwear_data);
        $newModel->photos = 'images/footwear/'.$newModel->id.'/';

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
                 $image->storeAs($newModel->photos.$color['color'], (string)Str::uuid().'.png');
            }
        }

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
}
