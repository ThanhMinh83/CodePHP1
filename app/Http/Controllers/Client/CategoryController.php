<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use DB;
class CategoryController extends Controller
{
    public function index($id){
      $product = Product::join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_category.category_id',$id)->get();
      $brand = DB::table('brand_category')->join('tbl_brand','brand_category.brand_brand_id','=','tbl_brand.brand_id')->where('category_category_id',$id)->get();

      return view('frontend.category.index',compact('product','brand'));
    }
}
