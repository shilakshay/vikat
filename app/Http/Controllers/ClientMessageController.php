<?php

namespace App\Http\Controllers;

use App\ClientMessage;
use Illuminate\Http\Request;

class ClientMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $message = ClientMessage::paginate(15);
        return view('admin.message.view')->with('message',$message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $table = new ClientMessage;
        $table->name = $request->name;
        $table->mobile = $request->phone;
        $table->email = $request->email;
        $table->message = $request->message;

        $table->save();
        return view('client.success')->with('message','Your message has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientMessage  $clientMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ClientMessage $clientMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientMessage  $clientMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientMessage $clientMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientMessage  $clientMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientMessage $clientMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientMessage  $clientMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientMessage $clientMessage)
    {
        //
    }
}
