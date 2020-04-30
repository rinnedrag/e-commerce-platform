<?php

namespace App\Http\Controllers;

use App\ClaspKind;
use App\Color;
use App\Country;
use App\Fitting;
use App\FootwearData;
use App\FootwearBrand;
use App\FootwearKind;
use App\HeelKind;
use App\Material;
use App\Services\FootwearService;
use App\Size;
use Illuminate\Http\Request;
use Psy\Util\Json;

class AdminPageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function newProductPage() {
        return view('admin.home')
            ->with('footwear_kinds', FootwearKind::all())
            ->with('clasp_kinds', ClaspKind::all())
            ->with('colors', Color::all())
            ->with('countries', Country::all())
            ->with('fitting', Fitting::all())
            ->with('footwear_brands', FootwearBrand::all())
            ->with('heel_kinds', HeelKind::all())
            ->with('materials', Material::all())
            ->with('sizes', Size::all());
    }
    //

    public function createProduct(Request $request) {
        $data = $request->all();

        $fs = new FootwearService();
        $fs->createFootwear($data);

        return response()->json($data);
    }

    public function updateFootwear(Request $request) {
        //TODO update FootwearData controller
    }

    public function deleteFootwear(Request $request) {
        //TODO delete FootwearData controller
    }
}
