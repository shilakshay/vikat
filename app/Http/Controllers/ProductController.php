<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::paginate(15);

        return view('admin.product.view',['product' => $product]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string',
            'desc' => 'string|required',
            'price' => 'numeric|required',
            'type' =>  'string|required'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'type' => $request->type
        ]);

        if(is_null($product)){
            return view('admin.error')->with('message','The product could not be created.');
        }
        return view('admin.success')->with('message','The product has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return Product::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('admin.product.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Validate the data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'desc' => 'string|required',
            'price' => 'numeric|required',
            'type' =>  'string|required'
        ]);

        //Find the product
        $product = Product::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->save();
        return view('admin.success')->with('message','Your product has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            $product = Product::find($id);
            $product->images()->delete();
            $product->slider()->delete();
            $product->delete();
            return view('admin.success')->with('message','The product has been deleted');
        }
        catch(\Throwable $th)
        {
            return view('admin.error')->with('message',"The operation could not be completed successfully.");
        }

    }
}
