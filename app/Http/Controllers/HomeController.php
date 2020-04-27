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
use Illuminate\Http\Request;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home.home');
    }

    public function catalog()
    {
        $footwear = Footwear::all(['id','brand','kind','price','photos']);

        return view('home.catalog')
            ->with('categories', FootwearKind::all())
            ->with('clasp_kinds', ClaspKind::all())
            ->with('colors', Color::all())
            ->with('countries', Country::all())
            ->with('fitting', Fitting::all())
            ->with('footwear_brands', FootwearBrand::all())
            ->with('heel_kinds', HeelKind::all())
            ->with('materials', Material::all())
            ->with('sizes', Size::all())
            ->with('footwear', $footwear);

    }

    public function cart() {
        return view('home.cart');
    }
}
