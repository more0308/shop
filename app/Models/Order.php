<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public static function is_check($product_id)
    {
        $count = DB::table('orders')
            ->where('user_id','=',Auth::user()->id)
            ->where('product_id','=',$product_id)
            ->first();
        if(isset($count) > 0) return true;
        else return false;
    }
    public static function orders()
    {
        $orders = Order::query()
            ->leftJoin('products', 'orders.product_id', '=', 'products.id')
            ->where('user_id','=',Auth::user()->id)
            ->orderBy('orders.created_at', 'DESC')
            ->limit(5)
            ->get();
        return $orders;
    }
    public static function is_order()
    {
        $count = DB::table('orders')
            ->where('user_id','=',Auth::user()->id)
            ->first();
        if(isset($count) > 0) return true;
        else return false;
    }
    public static function cost_orders()
    {
        $orders = DB::table('orders')
            ->leftJoin('products', 'orders.product_id', '=', 'products.id')
            ->where('user_id','=',Auth::user()->id)
            ->sum('price');
        return $orders;
    }
    public static function count_orders()
    {
        $orders = DB::table('orders')
            ->leftJoin('products', 'orders.product_id', '=', 'products.id')
            ->where('user_id','=',Auth::user()->id)
            ->count('orders.id');
        return $orders;
    }
}
