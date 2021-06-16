<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Conference;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
            $query
                ->leftJoin('product_names','products.id','=','product_names.product_id')
                ->where('language','=',App::getLocale())
                ->where("title", 'LIKE', "%$get%")
                ->orderBy('created_at')
                ->paginate(12);
        }
        $products = $query
            ->leftJoin('product_names','products.id','=','product_names.product_id')
            ->where('language','=',App::getLocale())
            ->orderBy('created_at')
            ->paginate(12)
            ->withPath('?'.$request->getQueryString());

        return view('welcome', ['categories'=>$categories, 'products'=>$products, 'get'=>$get]);
    }
    public function changeLocale($locale)
    {
        $languages = ['ru','ua','en'];
        if(!in_array($locale, $languages))
        {
            $locale='ru';
        }
        session(['locale'=>$locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
