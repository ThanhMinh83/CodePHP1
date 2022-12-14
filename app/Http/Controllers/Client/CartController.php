<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
Session_start();
use Session;
use Illuminate\Http\Request;
use DB;
use App\Models\Backend\Coupon;
class CartController extends Controller
{
  public function check_coupon(Request $request){
    $data = $request->all();
    $coupon  = Coupon::where('coupon_code',$data['coupon'])->first();
    if($coupon){
     
          $Session = session()->get('coupon_code');
          $couponcode = $coupon->code;
          if($Session != null){ 
            return response()->json(['error'=>'mã đã tồn tại']);
          }else{
            $cou = array(
              'couponcode' => $couponcode,
              'number' => $coupon->number
            );
            session()->put('coupon_code', $cou);
            return response()->json(['success'=> 'Thêm thành công']);
          }
        
        
    }else{
        return response()->json(['error'=> 'mã giảm giá không tồn tại hoặc đã hết hạn']);
    }
   
  }
    public function add_to_cart(Request $request){
      $data = $request->all();

      $cartDb = DB::table('cart')->where('product_id',$request->product_id)->first();
      
      if(!$cartDb){
        $cart = DB::table('cart')->insert($data); 
      }else{
        DB::table('cart')->where('product_id',$request->product_id)->update([
          'quantity' => $cartDb->quantity +1
        ]);
      }
    // $cartSession =  Session::put('cart',$cart);
     
      
    }
    public function view_cart(Request $request){
      $cart = DB::table('cart')->where('status','1')->orderby('id','DESC')->get();
      return view('frontend.cart.cart',compact('cart'));
    }

    public function delete($id){
      $cart = DB::table('cart')->where('product_id',$id)->delete();
      // Session::forget('coupon');
      return redirect()->back();
    }
}
