<?php

namespace App\Http\Controllers;

use App\ClaspKind;
use App\Color;
use App\Country;
use App\Fitting;
use App\FootwearData;
use App\FootwearBrand;
use App\FootwearImage;
use App\FootwearKind;
use App\FootwearMaterial;
use App\FootwearModel;
use App\FootwearModelSize;
use App\HeelKind;
use App\Material;
use App\Order;
use App\OrderProduct;
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

    public function broadcast() {
        return view('admin.broadcast');
    }

    public function newProductPage() {
        return view('admin.createProduct')
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

    public function productList() {
        return view('admin.productList')
            ->with('footwear', (new FootwearService())->getCatalog([])->paginate(5));
    }

    public function getOrders() {
        return view('admin.orderList')
            ->with('orders', Order::paginate(10));
    }

    public function getOrderPage($id) {
        return view('admin.orderPage')
            ->with('order', Order::where('id', $id)->first())
            ->with('orderProducts', (new FootwearService())->getFootwearDetailsForOrder($id));
    }

    public function updateOrderStatus(Request $request, $id) {
        $data =  $request->all();
        $validator = \Validator::make($data, [
            'order_status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator, '400');
        }
        Order::where('id', $id)->update(['order_status' => $data['order_status']]);
        return response()->json('successfully updated', 200);
    }

    public function getProduct($id) {
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

        return view('admin.productPage')
            ->with('model', $model)
            ->with('images', $images)
            ->with('materials', $materials)
            ->with('sizes', $sizes)
            ->with('colors', $availableColors);
    }

    public function createProduct(Request $request) {
        $data = $request->all();

        $fs = new FootwearService();
        $newModelID = $fs->createFootwear($data);

        return response()->json(['id' => $newModelID], 201);
    }

    public function updateFootwear(Request $request) {
        //TODO update FootwearData controller
    }

    public function deleteFootwear(Request $request) {
        //TODO delete FootwearData controller
    }
}
