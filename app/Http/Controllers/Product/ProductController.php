<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::query()
            ->leftJoin('product_names','products.id','=','product_names.product_id')
            ->where('language','=',App::getLocale())
            ->where('id','=',$id)
            ->first();
        $comments = Comment::query()

            ->where('is_valid','=',1)
            ->where('product_id','=',$id)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        if(!isset($product))
        {
            return abort(404);
        }
        return view('product.show', ['product'=>$product, 'comments'=>$comments]);
    }
    public function comment(Request $request)
    {
        $request->validate([
            'message'=>'required|max:200'
        ]);
        DB::table('comments')->insert([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->input('product_id'),
            'describe'=>$request->input('message'),
            'created_at'=>Carbon::now()
        ]);
        return redirect()->back();
    }
    public function orderAdd(Request $request)
    {
        /*DB::table('orders')->insert([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->input('id'),
            'created_at'=>Carbon::now()
        ]);*/
        $request->validate([
            'count'=>'required|int|min:1'
        ]);
        \Cart::session(Auth::user()->id)->add([
            'id' => (int)$request->input('id'),
            'name' => $request->input('name'),
            'price' => (float)$request->input('price'),
            'quantity' => (int)$request->input('count'),
            'attributes' => array($request->input('image'))
        ]);
        return redirect()->back();
    }
    public function orderDelete(Request $request)
    {
        \Cart::session(Auth::user()->id)->remove($request->input('id'));
        return redirect()->back();
    }
    public function paymentGet()
    {
        $total_price = 0;
        foreach (\Cart::session(Auth::user()->id)->getContent() as $order)
        {
            $total_price += $order->price * $order->quantity;
        }
        if($total_price == 0)
        {
            return redirect()->home();
        }
        return view('product.payment', ['total_price'=>$total_price]);
    }
    public function paymentPost(Request $request)
    {
        $request->validate([
            'full_name'=>'required',
            'address'=>'required'
        ]);

        foreach (\Cart::session(Auth::user()->id)->getContent() as $order)
        {
            DB::table('orders')
                ->insert([
                    'product_id'=>$order->id,
                    'full_name'=>$request->input('full_name'),
                    'address'=>$request->input('address'),
                    'status'=>'??????????????????',
                    'created_at'=>Carbon::now()
                ]);
        }
        \Cart::session(Auth::user()->id)->clear();
        return redirect()->home();
    }
}
