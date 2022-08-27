<?php

namespace App\Http\Controllers\Client;
use App\Models\Backend\City;
use App\Models\Backend\Province;
use App\Models\Backend\Wards;
use App\Models\Backend\Feeship;
use Carbon\Carbon;
use App\Models\Client\Shipping;
use App\Models\Client\OrderDetail;
use App\Models\Client\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
// session_start();

class CheckoutController extends Controller
{
    public function index(){
      $city = City::orderby('matp','ASC')->get();
       $cart = DB::table('cart')->where('status','1')->join('tbl_product','cart.product_id','=','tbl_product.product_id')->orderby('cart.id','DESC')->get();
      return view('frontend.cart.checkout',compact('cart','city'));
    }
    public function load_address(Request $request){
      $data = $request->all();
      if($data['action']){
        $output =  "";
        if($data['action'] == 'city'){
          $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
          $output .= '<option>--chọn Quận huyện--</option>'; 
          foreach($select_province as $province){
            $output .= '<option value = "'.$province->maqh.'">'.$province->name.'</option>'; 
          }   
        }else{
          $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
          $output .= '<option>--chọn xã phường--</option>'; 
          foreach($select_wards as $wards){
            $output .= '<option value = "'.$wards->xaid.'">'.$wards->name.'</option>'; 
          }
        }
      }
      echo $output;
    }
    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
          $feeship = Feeship::where('matp',$data['matp'])
          ->where('maqh',$data['maqh'])
          ->where('xaid',$data['xaid'])->get();
          if($feeship){
            $count = $feeship->count();
            if($count > 0){
              foreach($feeship as $key => $fee){
                    Session::put('fee',$fee->fee_feeship); 
                    Session::save();
            }
          }else{
              Session::put('fee','30000'); 
              Session::save();
          }
         
            // dd(  Session::put('fee',$fee->fee_feeship));
            
          }
        }
    }
    public function confirm_order(Request $request){
          $data = $request->all();
          $shiping = new Shipping();
          $shiping->fullname = $data['fullname'];
          $shiping->phone = $data['phone'];
          $shiping->email = $data['email']; 
          $shiping->address = $data['address'];
          $shiping->note = $data['note'];
          $shiping->payment = $data['payment']; 
          $shiping->created_at = Carbon::now('Asia/Ho_Chi_Minh');
          $shiping->save();
          // foreach($shiping as $value){
          //     $value->shipping_id =  $shiping_id;
          // }
          $shiping_id  = $shiping->shipping_id ;

          $code_order = substr(md5(microtime()),rand(0,26),8);

          $order  = new Order();
          $order->shipping_id = $shiping_id;
          $order->user_id = $data['user_id'];
          $order->order_status = "1";
          $order->order_code = $code_order;
          $order->created_at = Carbon::now('Asia/Ho_Chi_Minh');
          $order->save();

         
          $cart = DB::table('cart')->where('status','1')->orderby('id','DESC')->get();
          if($cart){
            foreach($cart as $value){
              $order_detail = new OrderDetail();
              $order_detail->order_code = $code_order;
              $order_detail->product_id = $value->product_id;
              $order_detail->product_name = $value->name;
              $order_detail->product_price = $value->price;
              $order_detail->product_coupon = $data['coupon'];
              $order_detail->product_feeship = $data['feeship'];
              $order_detail->product_sales_quantity = $value->quantity;
              $order_detail->created_at = Carbon::now('Asia/Ho_Chi_Minh');
              $order_detail->save();
            }
          }
          DB::table('cart')->where('status','1')->update([
          'status' => '0'
        ]);
          
    }
}
