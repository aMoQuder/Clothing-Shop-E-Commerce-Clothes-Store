<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest as RequestsProductRequest;
use App\Http\Requests\Request\ProductRequest;
use App\Model\category;
use App\Model\color;
use App\Model\product;
use App\Model\size;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function all()
    {
        $product = product::all();
        $category = category::all();
        return view('products.product', ["product" => $product], ["category" => $category]);
    }
    public function Details($id)
    {
        $count=1;
        $product = product::FindOrfail($id);
        $category = category::all();
        $color = color::all();
        $size = size::all();
        return view('shopDetails', ["product" => $product,"count" => $count, "color" => $color, "size" => $size], ["category" => $category]);
    }
    public function shop()
    {
        $count=1;

        $countproduct=1;
        $product = Product::all();
        $category = category::all();
        $color = color::all();
        $size = size::all();
        return view('shop', ["product" => $product,"countproduct" => $countproduct, "count" => $count, "color" => $color, "size" => $size], ["category" => $category]);
    }

    public function show($id)
    {
        $product = product::FindOrfail($id);
        $category = category::all();
        $color = color::all();
        $size = size::all();
        return view('products.show', ["product" => $product, "color" => $color, "size" => $size], ["category" => $category]);
    }

    public function create()
    {
        $count = 1;
        $category = category::all();
        $color = color::all();
        $sizes = size::all();
        $product =  product::all();
        return view('products.create', ["colors" => $color, "product" => $product, "category" => $category, "sizes" => $sizes, "count" => $count]);
    }

    public function store(RequestsProductRequest $request)
    {
         $sizeeStrore=[];
        $coloreStrore=[];
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = rand(1, 1000) . time() . "." . $image->extension();
            $image->move(public_path('product/image/'), $imageName);
        }
        if ($request->has('colors')) {

            foreach ($request->colors as $color) {
                if ($color != "") {
                    $colores = color::all();
                    $condation = true;
                    foreach ($colores as $item) {
                        if ($item->name == $color) {
                            $condation = false;
                        }
                    }

                    if ($condation) {
                        color::create([
                            'name' => $color,
                        ]);
                        $colores1 = color::all();
                        foreach ($colores1 as $item) {
                            if ($item->name == $color) {
                                $coloreStrore[] = $item->id;
                            }
                        }
                    } else {
                        $colores1 = color::all();
                        foreach ($colores1 as $item) {
                            if ($item->name == $color) {
                                $coloreStrore[] = $item->id;
                            }
                        }
                    }
                }
            }
        }
        if ($request->has('color_id')) {
            foreach ($request->color_id as $item) {
                $coloreStrore[] = $item;
            }
        }
        if ($request->has('sizes')) {
            foreach ($request->sizes as $size) {
                if ($size != "") {
                    $sizees = size::all();
                    $condation = true;
                    foreach ($sizees as $item) {
                        if ($item->name == $size) {
                            $condation = false;
                        }
                    }

                    if ($condation) {
                        size::create([
                            'name' => $size,
                        ]);
                        $sizees1 = size::all();
                        foreach ($sizees1 as $item) {
                            if ($item->name == $size) {
                                $sizeeStrore[] = $item->id;
                            }
                        }
                    } else {
                        $sizees1 = size::all();
                        foreach ($sizees1 as $item) {
                            if ($item->name == $size) {
                                $sizeeStrore[] = $item->id;
                            }
                        }
                    }
                }
            }
        }
        if ($request->has('size_id')) {
            foreach ($request->size_id as $item) {
                $sizeeStrore[] = $item;
            }
        }
        product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'description' => $request->description,
            'color_id' => $coloreStrore,
            'size_id' => $sizeeStrore,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('createProduct')->with('massege', 'product created successfully!');
    }



    public function delet($id)
    {
        $old_id = $id;
        $products = product::FindOrfail($old_id);

        if (File::exists(public_path('product/image/' . $products->image))) {
            File::delete(public_path('product/image/' . $products->image));
        };
        $products->delete();
        return redirect()->route('deletproduct')->with("massege", "you delete product now");
    }


    public function save(Request $request)
    {
        $old_id = $request->old_id;
        $product = product::FindOrfail($old_id);

        if ($request->description == "") {
            $old_description = $request->old_description;
        } else {
            $old_description =  $request->description;
        }
        // ------------------------------------------------------------------------------------------

        if ($request->hasFile('image')) {
            if (File::exists(public_path('product/image/' . $product->image))) {
                File::delete(public_path('product/image/' . $product->image));
            };
            $image = $request->image;
            $imageName1 = rand(1, 1000) . time().".".$image->extension();
            $image->move(public_path("product/image/"), $imageName1);
        } else {
            $imageName1 = $request->old_image;
        }
        $coloreStrore=[];
        $sizeeStrore=[];
        if ($request->has('colors')) {
            $product->color_id=[];
            foreach ($request->colors as $color) {
                if ($color != "") {
                    $colores = color::all();
                    $condation = true;
                    foreach ($colores as $item) {
                        if ($item->name == $color) {
                            $condation = false;
                        }
                    }

                    if ($condation) {
                        color::create([
                            'name' => $color,
                        ]);
                        $colores1 = color::all();
                        foreach ($colores1 as $item) {
                            if ($item->name == $color) {
                                $coloreStrore[] = $item->id;
                            }
                        }
                    } else {
                        $colores1 = color::all();
                        foreach ($colores1 as $item) {
                            if ($item->name == $color) {
                                $coloreStrore[] = $item->id;
                            }
                        }
                    }
                }
            }
        }
        if ($request->has('color_id')) {
            $product->color_id=[];

            foreach ($request->color_id as $item) {
                $coloreStrore[] = $item;
            }
        }
        if ($request->has('sizes')) {
            $product->size_id=[];

            foreach ($request->sizes as $size) {
                if ($size != "") {
                    $sizees = size::all();
                    $condation = true;
                    foreach ($sizees as $item) {
                        if ($item->name == $size) {
                            $condation = false;
                        }
                    }

                    if ($condation) {
                        size::create([
                            'name' => $size,
                        ]);
                        $sizees1 = size::all();
                        foreach ($sizees1 as $item) {
                            if ($item->name == $size) {
                                $sizeeStrore[] = $item->id;
                            }
                        }
                    } else {
                        $sizees1 = size::all();
                        foreach ($sizees1 as $item) {
                            if ($item->name == $size) {
                                $sizeeStrore[] = $item->id;
                            }
                        }
                    }
                }
            }
        }
        if ($request->has('size_id')) {
            $product->size_id=[];
            foreach ($request->size_id as $item) {
                $sizeeStrore[] = $item;
            }
        }
        $product->update(
            [
                'name' => $request->name,
                'image' => $imageName1,
                'price' => $request->price,
                'description' => $old_description,
                'color_id' => $coloreStrore,
                'size_id' => $sizeeStrore,
                'parent_id' => $request->parent_id,
            ]
        );
        return redirect()->route('home')->with("massege", "you edit product now");
    }


    public function update($id)
    {
        $count = 1;
        $color = color::all();
        $product = product::FindOrfail($id);
        $sizes = size::all();
        $category = category::all();
        return view('products.update', ["colors" => $color,"category" => $category, "sizes" => $sizes,"product" => $product,"id" => $id, "count" => $count]);
    }
}
