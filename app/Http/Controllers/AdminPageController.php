<?php

namespace App\Http\Controllers;

use App\ClaspKind;
use App\Color;
use App\Country;
use App\Fitting;
use App\Footwear;
use App\FootwearBrand;
use App\FootwearKind;
use App\HeelKind;
use App\Material;
use App\Size;
use DebugBar\DebugBar;
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
        if ($request->hasFile('color[0][images]')) {
            echo($request->file('color[0][images]'));
        }
        return response()->json($data);
    }
}
