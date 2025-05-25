<?php

namespace App\Http\Controllers;

use App\Model\category;
use App\Model\Events;
use App\Model\product;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

    $products = Product::inRandomOrder()->take(12)->get();
    // تقسيم المنتجات إلى مجموعتين كل مجموعة تحتوي على 8 منتجات
    $firstSet = $products->slice(0, 8);
    $secondSet = $products->slice(8, 4);


    // جلب جميع التصنيفات 
    $categories = Category::all();

    // لكل تصنيف، جلب عدد المنتجات المرتبطة به
    $categoriesWithProductCount = $categories->map(function ($category) {
        // حساب عدد المنتجات التي تتبع هذا التصنيف بناءً على parent_id
        $category->product_count = Product::where('parent_id', $category->id)->count();
        return $category;
    });

    return view('welcome', ['firstSet' => $firstSet, 'secondSet' => $secondSet ,"category" =>$categoriesWithProductCount]);



        // $categoriesWithProducts = $categories->map(function ($category) {
        //     $category->products = Product::where('parent_id', $category->id)->get();
        //     return $category;
        // });
        // $prorandom = product::inRandomOrder()->take(8)->get();
        // $Catrandom1 = product::inRandomOrder()->first();
        // $cartItems = CartFacade::getContent();
        // return view('welcome', ["product" => $product,"prorandom" => $prorandom,"catrand" => $Catrandom1, "cartItems" => $cartItems,  "categoriesWithProducts" => $categoriesWithProducts], ["category" => $categories]);
    }

}
