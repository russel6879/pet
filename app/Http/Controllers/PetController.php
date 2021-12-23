<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = new Pet();

        $strpos = strpos($request->image, ';');
                $sub = substr($request->image, 0, $strpos);
                $ex = explode('/', $sub)[1];
                $name =Str::random(5).time() . "." . $ex;
                $img = Image::make($request->image)->resize(270, 265);
                $upload_path = public_path() . "/images/";
                $img->save($upload_path . $name,'jpg','png');
                $form->image = $name;

                $form->petName = $request->petName;
                $form->color = $request->color;
                $form->petType = $request->petType;
                $form->location = $request->location;
                $form->address = $request->address;
                $form->phone = $request->phone;
                $form->description = $request->description;
                $form->userId =Auth::user()->id;
                $form->save();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

}
