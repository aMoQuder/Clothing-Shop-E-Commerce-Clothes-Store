<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Model\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        return view('products.addCategory');
    }
    public function create(CategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = rand(1, 1000) . time() . "." . $image->extension();
            $image->move(public_path('category/image/'), $imageName);
        }
        category::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        return redirect()->route('addcategory')->with("massege","created successfuly for new category");
    }
}
