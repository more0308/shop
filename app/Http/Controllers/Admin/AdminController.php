<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $query = Product::query();
        $products = $query->orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.index',['products'=>$products]);
    }
    public function productDelete($id){

        $product = Product::find($id);
        if(file_exists(public_path($product->image)))
        {
            unlink(public_path($product->image));
        }
        DB::table('products')
            ->where('id','=',$id)
            ->delete();
        return redirect()->back();
    }
    public function productShow($id)
    {
        $product = Product::all()
            ->where('id','=',$id)
            ->first();
        $categories = Category::all();

        return view('admin.product_correct', ['product'=>$product, 'categories'=>$categories]);
    }
    public function productUpdate(Request $request)
    {
        $request->validate([
            'title'=>'nullable|max:100',
            'describe'=>'nullable|max:500',
            'price'=>'nullable|int|min:1',
            'image'=>'nullable|mimes:jpeg,png,jpg|dimensions:max_width=10000, max_height=10000'
        ]);
        $product = Product::find($request->input('id'));
        if($request->input('title') != '')
        {
            $product->title = $request->input('title');
        }
        if($request->input('category_id') != '0')
        {
            $product->category_id = $request->input('category_id');
        }
        if($request->input('count') != '')
        {
            $product->count = $request->input('count');
        }
        if($request->input('price') != '')
        {
            $product->price = $request->input('price');
        }
        if($request->input('describe') != '')
        {
            $product->describe = $request->input('describe');
        }
        if($request->hasFile('image'))
        {
            if(file_exists(public_path($product->image)))
            {
                unlink(public_path($product->image));
            }
            $image = $request->file('image');
            \Image::make($image)->save(public_path($product->image));
        }
        $product->save();
        return redirect()->back();
    }
    public function productCreateGet()
    {
        $categories = Category::all();
        return view('admin.product_create', ['categories'=>$categories]);
    }
    public function productCreatePost(Request $request)
    {
        $request->validate([
            'title2'=>'required|max:100',
            'describe2'=>'required|max:500',
            'title3'=>'required|max:100',
            'describe3'=>'required|max:500',
            'title1'=>'required|max:100',
            'describe1'=>'required|max:500',
            'price'=>'required|int|min:1',
            'count'=>'required|int|min:0',
            'image'=>'required|mimes:jpeg,png,jpg|dimensions:max_width=10000, max_height=10000'
        ]);
        $image = $request->file('image');
        $image_name = md5(microtime() . rand(0, 9999)).".png";
        \Image::make($image)->save(public_path('assets/image/'.$image_name));
        DB::table('products')
            ->insert([
                'price'=> $request->input('price'),
                'count'=> $request->input('count'),
                'image'=> 'assets/image/'.$image_name,
                'category_id'=> $request->input('category_id')
            ]);
        $product_max_id = DB::table('products')
            ->max('id');
        DB::table('product_names')
            ->insert([
                'product_id'=> $product_max_id,
                'language'=>'ua',
                'title'=> $request->input('title1'),
                'describe'=> $request->input('describe1'),
            ]);
        DB::table('product_names')
            ->insert([
                'product_id'=> $product_max_id,
                'language'=>'ru',
                'title'=> $request->input('title2'),
                'describe'=> $request->input('describe2'),
            ]);
        DB::table('product_names')
            ->insert([
                'product_id'=> $product_max_id,
                'language'=>'en',
                'title'=> $request->input('title3'),
                'describe'=> $request->input('describe3'),
            ]);
        return redirect()->route('admin.index');
    }


}
