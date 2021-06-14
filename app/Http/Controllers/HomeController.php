<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Conference;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();

        $get = $request->input('search');
        #Проверка если есть GET параметр
        if(filled($get))
        {
            $query->where("title", 'LIKE', "%$get%")->paginate(12);
        }
        $products = $query->orderBy('created_at')->paginate(12)->withPath('?'.$request->getQueryString());

        return view('welcome', ['categories'=>$categories, 'products'=>$products, 'get'=>$get]);
    }
}
