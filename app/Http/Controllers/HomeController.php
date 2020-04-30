<?php

namespace App\Http\Controllers;

use App\ClaspKind;
use App\Color;
use App\Country;
use App\Fitting;
use App\FootwearData;
use App\FootwearBrand;
use App\FootwearMaterial;
use App\FootwearModel;
use App\FootwearModelSize;
use App\FootwearImage;
use App\FootwearKind;
use App\HeelKind;
use App\Material;
use App\Services\FootwearService;
use App\Size;
use Arr;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;
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
            ->with('footwear', (new FootwearService())->getCatalog());

    }

    public function productPage($id) {
        $fd = 'footwear_data.';
        $model = FootwearModel::where('footwear_models.id',$id)
        ->join('footwear_data','footwear_models.footwear_id','=', 'footwear_data.id')
        ->select('footwear_models.*', $fd.'brand', $fd.'kind', $fd.'clasp_kind', $fd.'heel_kind',
            $fd.'description', $fd.'season', $fd.'gender', $fd.'fitting', $fd.'producer_country')->first();
        if (!$model) {
            return view('layouts.404');
        }
        $images = FootwearImage::where('model_id', $id)->select('filename')->get();
        $sizes = FootwearModelSize::where('model_id', $id)->get();
        $availableColors = FootwearModel::where('footwear_models.footwear_id', $model['footwear_id'])
            ->join('colors','colors.color','=','footwear_models.color')
            ->select('footwear_models.id','colors.color','colors.code')->get();
        $materials = FootwearMaterial::where('footwear_id',$model['footwear_id'])->get();

        return view('home.productPage')
            ->with('model', $model)
            ->with('images', $images)
            ->with('materials', $materials)
            ->with('sizes', $sizes)
            ->with('colors', $availableColors);
    }

    public function cart() {
        $cart = session()->get('cart');
        if (!$cart) {
            return (view('home.cart'));
        }
        $footwear_ids = [];
        foreach ($cart as $id => $details) {
            array_push($footwear_ids, $details['model']);
        }
        $images = FootwearImage::select(['model_id', DB::raw('MAX(filename) as filename')])->groupBy('model_id');
        $footwear = DB::table('footwear_models')->joinSub($images, 'images', function($join) {
            $join->on('footwear_models.id', '=', 'images.model_id');})
            ->select('footwear_models.price', 'footwear_models.id', 'images.filename')
            ->whereIn('id', $footwear_ids)->get();
        $footwearData = $footwear->groupBy('id');
        return view('home.cart')
            ->with('footwearData', $footwearData);
    }

    public function addToCart(Request $request, $id) {
        if (!FootwearModel::whereId($id)->get()) {
            return view('layouts.404');
        }

        $cart = session()->get('cart');
        $data = $request->all();

        //cart is empty
        if (!$cart) {
            $cart = [
                $id.'-'.$data['size'] => [
                    'size' => $data['size'],
                    'brand' => $data['brand'],
                    'kind' => $data['kind'],
                    'model' => $id,
                    'quantity' => $data['quantity']
                ]
            ];
            session()->put('cart', $cart);
            return back();
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id.'-'.$data['size']])) {
            $cart[$id.'-'.$data['size']]['quantity']++;
            session()->put('cart', $cart);
            return back();
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id.'-'.$data['size']] = [
            'size' => $data['size'],
            'brand' => $data['brand'],
            'kind' => $data['kind'],
            'model' => $id,
            'quantity' => 1
        ];

        session()->put('cart', $cart);

        return back();
    }

    public function profile() {
        return view('home.profile');
    }
}
