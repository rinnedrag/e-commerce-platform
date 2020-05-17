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
use Image;
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

    public function catalogPage(Request $request)
    {
        $filterParameters = $request->all();
        $footwear = (new FootwearService())->getCatalog(collect($filterParameters));

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

    public function catalogData(Request $request)
    {
        $filterParameters = $request->all();
        return response()->json((new FootwearService())->getCatalog(collect($filterParameters)), 200);
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

    public function productData($id) {
        $images = FootwearImage::where('model_id', $id)->select(['model_id', 'filename'])->get();
        $sizes = FootwearModelSize::where('model_id', $id)->get();
        $model_details = FootwearModel::where('id', $id)->select('price')->first();

        $response = collect(
          [
              'images' => $images,
              'sizes' => $sizes,
              'model_details' => $model_details
          ]
        );
        return response()->json($response, 200);
    }


    public function profile() {
        return view('home.profile');
    }
}
