<?php

namespace App\Http\Controllers;

use App\ProductImages;
use App\Product;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class ProductImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = ProductImages::with('product')->paginate(15);
        //return ($images);
        return view('admin.productimages.view')->with('collection',$images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $product = Product::where('id','=',$id)->first();
        if(is_null($product)){
            return view('admin.error')->with('message','No such records exists.');
        }
        return view('admin.productimages.upload')->with('product_name',$product->name)
                                                ->with('id',$id);
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
        $validateData = $request->validate([
            'product.*' => 'mimes:jpg,png,jpeg,bmp|required',
            'id' => 'required'
        ]);

        try{
            $files = $request->file('product');
            if($request->hasFile('product'))
            {
                foreach($files as $file)
                {
                    $file_with_ext = $file->getClientOriginalName();
                    $filename = pathinfo($file_with_ext, PATHINFO_FILENAME);
                    $file_extension = $file->getClientOriginalExtension();
                    $photoname = $filename . "-" . sha1(time()) . "." . $file_extension;
                    $file->storeAs('public/image/product-images/', $photoname);
                    $url ="/storage/image/product-images/" . $photoname;
                    $product = ProductImages::create([
                        'url' => $url,
                        'name' => $file_with_ext,
                        'product_id' => $request->id
                    ]);
                }

                return view('admin.success')->with('message','The images have been uploaded successfully.');
            }
        }
        catch(\Throwable $th)
        {
            return view('admin.error')->with('message','Some error has occured');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductImages  $productImages
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImages $productImages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductImages  $productImages
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImages $productImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductImages  $productImages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImages $productImages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductImages  $productImages
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImages $productImages,$id)
    {
        //
        try{
            $productImages = ProductImages::find($id);
            $productImages->delete();
            return view('admin.success')->with('message','The product photo has been deleted successfully.');
        }
        catch(\Throwable $e)
        {
            return view('admin.error')->with('message',"The operation could not be completed.");
        }
    }
}
