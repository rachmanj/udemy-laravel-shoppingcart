<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        // $products = Product::whereHas('category', function (Builder $query) {
        //     $query->where('category_name', 'Vegetables');
        // })->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('category_name')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $this->validate($request, [
            'name'          => 'required|unique:products',
            'price'         => 'required',
            'categories_id' => 'required',
            'product_image' => 'nullable|max:5126'
        ]);

        // dd($imageName);

        if($request->hasFile('product_image')) {
            // 1. get filename with extension
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            // 2. get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // 3. get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
            // 4. create filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // upload the file
            $request->file('product_image')->storeAs('public/product_images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->categories_id = $request->input('categories_id');
        $product->image = $filenameToStore;

        // dd($product);

        $product->save();

        return redirect()->route('products.index')->with('status', 'New Product successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('category_name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'              => 'required',
            'price'             => 'required',
            'categories_id'     => 'required',
            'product_image'     => 'nullable|max:5126'
        ]);

        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->categories_id = $request->input('categories_id');

        if($request->hasFile('product_image')) {
            // 1. get filename with extension
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            // 2. get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // 3. get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
            // 4. create filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // upload the file
            $request->file('product_image')->storeAs('public/product_images', $filenameToStore);

            if($product->image != 'noimage.jpg') {
                Storage::delete('public/product_images/'.$product->image);
            }

            $product->image = $filenameToStore;

        }

        $product->update();

        return redirect()->route('products.index')->with('status', 'Product successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if($product->image != 'noimage.jpg') {
            Storage::delete('public/product_images/'.$product->image);
        }
        $product->delete();

        return redirect()->route('products.index')->with('status', 'Product successfully deleted');
    }

    public function activate($id)
    {
        $product = Product::find($id);

        $product->status = 1;
        $product->update();

        return redirect()->route('products.index');
    }

    public function unactivate($id)
    {
        $product = Product::find($id);

        $product->status = 0;
        $product->update();

        return redirect()->route('products.index');
    }
}
