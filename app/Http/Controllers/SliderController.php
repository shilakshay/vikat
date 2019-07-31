<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try{
            $slider = Slider::with('product')->get();
            return view('admin.slider.view')->with('slider',$slider);
        }
        catch(\Throwable $th)
        {
            return view('admin.error')->with('message',"The given operation could not be completed.");
        }
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
            'slider.*' => 'required|mimes:jpg,bmp,png,jpeg',
            'product_name' => 'required'
        ]);

        if(Input::file('slider'))
        {
            $file_with_ext =Input::file('slider')->getClientOriginalName();
            $filename = pathinfo($file_with_ext,PATHINFO_FILENAME);
            $file_extension = Input::file('slider')->getClientOriginalExtension();
            $photoname = $filename . sha1(time()) . '.' . $file_extension;
            Input::file('slider')->storeAs('public/image/slider',$photoname);
            $slider = new Slider;
            $slider->product_id = $request->product_name;
            $slider->public_path = '/storage/image/slider/'.$photoname;
            $slider->save();
            return view('admin.success')->with('message',"Your slider photo has been uploaded.");
        }
        return view('admin.error')->with('message',"The image could not be uploaded.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
        $product = Product::all();
        return view('admin.slider.create')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider,$id)
    {
        //
        try{
            $slider = Slider::find($id);
            $slider->delete();
            return view('admin.success')->with('message',"The slider photo has been successfully delete.");
        }
        catch(\Throwable $th)
        {
            return view('admin.error')->with('message',"This operation could not be completed successfully.");
        }
    }
}
