<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Member;
use App\Models\Menu;
use App\Models\Menu_Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use phpDocumentor\Reflection\DocBlock\Description;
use Qcloud\Sms\SmsSingleSender;

class ApiController extends Controller
{
    //商家列表
    public function BusinessList(Request $request){
        $keyword = $request->keyword;
        if($keyword){
            $shops = Shop::where('status',1)->where('shop_name','like',"%$keyword%")->get();
        }else{
            $shops = Shop::where('status',1)->get();
        }
        return $shops;
    }
    //获取指定商家
    public function Business()
    {
        $id = $_GET['id'];
        $shops = Shop::find($id);
        $menu_categorys = Menu_Category::where('shop_id','=',$id)->get()->toArray();
        foreach ($menu_categorys as &$menu_category){
            $menu_category['goods_list'] = [];
            $menus =    Menu::where('category_id','=',$menu_category['id'])->get()->toArray();
            foreach ($menus as &$menu){
                $menu['goods_id'] = $menu['id'];
                unset($menu['id']);
                $menu_category['goods_list'][] = $menu;
            }
            //$menu_category['goods_list'] = $menus;
        }
         $shops['commodity'] = $menu_categorys;
            return $shops;
    }

    //短信验证
    public function sms(Request $request)
    {
        $tel = $request->tel;
        // 短信应用SDK AppID
        $appid = 1400189719; // 1400开头
        // 短信应用SDK AppKey
        $appkey = "7571e72a66c0d376d93346d2ce7fb416";
        // 需要发送短信的手机号码
        $phoneNumber = $tel;
        // 短信模板ID，需要在短信应用中申请
        $templateId = 285069;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请
        $smsSign = "陈贸生活记录"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`
        try {
            $ssender = new SmsSingleSender($appid, $appkey);
            $code = mt_rand(1000, 9999);
            $params = [$code, 5];
            $result = $ssender->sendWithParam("86", $phoneNumber, $templateId,
                $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
            var_dump($result);
            //把验证存入Redis
            Redis::setex($tel, 300, $code);
        } catch (\Exception $e) {
            var_dump($e);
        }
    }
    //会员注册
    public function regist(Request $request)
    {
        $tel = Member::where('tel', $request->tel)->first();
        if ($tel) {
            return [
                'status' => 'false',
                'message' => '号码已注册',
            ];
        }
        if ($request->sms == Redis::get($request->tel)) {
            $data = [
                'username' => $request->username,
                'tel' => $request->tel,
                'password' => Hash::make($request->password),
                'remember_token' => uniqid(),
            ];
//            var_dump($data);exit;
            Member::create($data);
            return [
                'stauts' => 'true',
                'message' => '注册成功',
            ];

        } else {
            return [
                'stauts' => 'false',
                'message' => '验证码错误',
            ];
        }

    }
    //登录
    public function loginCheck(Request $request)
    {
        if(Auth::attempt([
            'username' => $request->name,
            'password' => $request->password,
        ])){
             return [
                 "status"=>"true",
                 "message"=>"登录成功",
                 "user_id"=>Auth::user()->id,
                 "username"=>Auth::user()->username,
                  ];
        }else{
            return [
                "status"=>"false",
                "message"=>"登录失败",
             ];
        }
    }
    //添加收货地址
    public function addAddress(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'tel' => $request->tel,
            'provence'=>$request->provence,
            'city' => $request->city,
            'county' =>$request->area,
            'user_id'=>Auth::user()->id,
            'address' =>$request->detail_address,
            'is_default'=>0,
        ];
        Address::create($data);
        return [
            'status' => 'true',
            'message' => '添加成功',
        ];
    }
    //获取收获地址列表
    public function AddressList(){
        $address = Address::where('user_id','=',Auth::user()->id)->get();

        foreach ($address as $a){
            $a['area'] = $a->county;
            $a['detail_address'] = $a->address;
        }
        return $address;
    }
    //指定用户地址 回显
    public function Address(Request $request)
    {
        $address = Address::find($request->id);
        $address['area'] = $address->county;
        $address['detail_address'] = $address->address;
        return $address;
    }
    //修改地址
    public function editAddress(Request $request)
    {
       $address = Address::find($request->id);
        $address->update([
            'name'=>$request->name,
            'tel' => $request->tel,
            'provence' => $request->provence,
            'county' => $request->area,
            'address' => $request->detail_address,
            'city' => $request->city,
        ]);
        return [
            'status' => 'true',
            'message' => '修改成功'
        ];
    }
    //获取购物车数据接口
    public function Cart()
    {
        $goods_list= DB::table('carts')->leftjoin('menus','carts.goods_id','=','menus.id')
            ->select('carts.goods_id','menus.goods_name','menus.goods_img','carts.amount','menus.goods_price')
            ->where('carts.user_id',Auth::user()->id)
            ->get();
        $money=0;
        foreach ($goods_list as $goods){
            $money+=$goods->goods_price*$goods->amount;
        }
        return ['goods_list'=>$goods_list,'totalCost'=>$money];
    }
    //添加购物车
    public function Addcart(Request $request)
    {
        if (!$request->goodsList){
            return    ["status"=> "false",
                        "message"=> "请先选择商品"];
        }
        for ($i=0;$i<count($request->goodsList);$i++){
            Cart::create([
                'user_id'=>Auth::user()->id,
                'goods_id'=>$request->goodsList[$i],
                'amount'=>$request->goodsCount[$i],
            ]);
        }
        return    [
                    "status"=> "true",
                    "message"=> "添加成功"
                  ];
    }
    //添加订单接口
    public function addOrder(Request $request)
    {
        $address_id = $request->address_id;

        $user_id = Auth::user()->id;
        $shop_id = Menu::find(Cart::where('user_id','=',$user_id)->first()->goods_id)->shop_id;
        $address = Address::find($address_id);
        $carts = Cart::where('user_id','=',$user_id)->get();
        $total = 0;
        foreach ($carts as $cart){
            $good = Menu::find($cart->goods_id);
            $total += $cart->amount * $good->goods_price;
        }
        $order_id = "";
        try {
            DB::transaction(function () use($request,$user_id,$shop_id,$address,$total,$carts,&$order_id) {
                $data_order = [
                    'user_id' => $user_id,
                    'shop_id' => $shop_id,
                    'sn' => date('Ymd').mt_rand(1000, 9999),
                    'province' => $address->provence,
                    'city' => $address->city,
                    'county' => $address->county,
                    'address' => $address->address,
                    'tel' => $address->tel,
                    'name' => $address->name,
                    'total' => $total,
                    'status' => 0,
                    'out_trade_no' => uniqid(),
                ];
                $order = Order::create($data_order);
                $order_id = $order->id;
                foreach ($carts as $cart) {
                    $good = Menu::find($cart->goods_id);
                    $data_goods = [
                        'order_id' => $order_id,
                        'goods_id' => $cart->goods_id,
                        'amount' => $cart->amount,
                        'goods_name' => $good->goods_name,
                        'goods_img' => $good->goods_img,
                        'goods_price' => $good->goods_price,
                    ];
                    OrderDetail::create($data_goods);
                }
            });

            return [
                "status"=>"true",
                "message"=>"添加成功",
                "order_id"=>$order_id,
            ];
        }catch (\Exception $e){
            return [
                "status"=> "false",
                "message"=> "添加失败",
            ];
        }

    }
    //指定订单
    public function order(Request $request)
    {
        $order_id = $request->id;
        $order = Order::find($order_id);
        $shop = Shop::find($order->shop_id);
        $result = [];

        $result['id'] = $order->id;
        $result['shop_id'] = $order->shop_id;
        $result['order_code'] = $order->sn;
        $result['order_birth_time'] = $order->created_at->toArray()['formatted'];
        $order_status = "";
        switch ($order->status){
            case -1:
                $order_status = "已取消";
                break;
            case 0:
                $order_status = "待付款";
                break;
            case 1:
                $order_status = "待发货";
                break;
            case 2:
                $order_status = "待确认";
                break;
            case 3:
                $order_status = "完成";
                break;
        }
        $result['order_status'] = $order_status;
        $result['shop_name'] = $shop->shop_name;
        $result['shop_img'] = $shop->shop_img;
        $result['order_price'] = $order->total;
        $result['order_address'] = $order->address;
        $goods = OrderDetail::where('order_id','=',$order_id)->get();
        $result['goods_list'] = $goods;
        return $result;
    }

//订单列表
    public function orderList()
    {

        $orders = Order::where('user_id','=',Auth::user()->id)->get();
        $res = [];
        foreach ($orders as $order){
            $shop = Shop::find($order->shop_id);
            $result = [];
            $result['id'] = $order->id;
            $result['shop_id'] = $order->shop_id;
            $result['order_code'] = $order->sn;
            $result['order_birth_time'] = $order->created_at->toArray()['formatted'];
            $order_status = "";
            switch ($order->status){
                case -1:
                    $order_status = "已取消";
                    break;
                case 0:
                    $order_status = "待付款";
                    break;
                case 1:
                    $order_status = "待发货";
                    break;
                case 2:
                    $order_status = "待确认";
                    break;
                case 3:
                    $order_status = "完成";
                    break;
            }
            $result['order_status'] = $order_status;
            $result['shop_name'] = $shop->shop_name;
            $result['shop_img'] = $shop->shop_img;
            $result['order_price'] = $order->total;
            $result['order_address'] = $order->address;
            $goods = OrderDetail::where('order_id','=',$order->id)->get();
            $result['goods_list'] = $goods;
            $res[] = $result;
        }
        return $res;
    }
    //修改密码
    public function changePassword(Request $request)
    {
        $user = Auth::user();
        if(!Hash::check($request->oldPassword,$user->password)) {
            return [
                'status' => 'false',
                'message' => '密码不正确',
            ];
        }
        $user->update([
            'password' =>Hash::make($request->newPassword),
        ]);
        return [
            'status' => 'true',
            'message' => '修改成功'
        ];
    }
    //重置密码
    public function forgetPassword(Request $request)
    {
        $tel = DB::table('members')->where('tel',$request->tel)->first();
        if (!$tel){
            return [
                'status' => 'false',
                'message' => '手机号码不正确',
            ];
      }

        if($request->sms == Redis::get($request->tel)){
            //获取手机号对应的ID，并修改密码
            Member::where('tel',$request->tel)->update(['password' => Hash::make($request->password)]);

            return [
                'status' => 'true',
                'message' => '重置成功',
            ];
        }else{
            return [
                'status' => 'false',
                'message' => '验证码不正确',
            ];
        }
    }
}
