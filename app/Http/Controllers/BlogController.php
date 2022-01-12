<?php

namespace App\Http\Controllers;

use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
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
        $form = new Blog();

        $strpos = strpos($request->image, ';');
                $sub = substr($request->image, 0, $strpos);
                $ex = explode('/', $sub)[1];
                $name =Str::random(5).time() . "." . $ex;
                $img = Image::make($request->image)->resize(270, 265);
                $upload_path = public_path() . "/images/";
                $img->save($upload_path . $name,'jpg','png');
                $form->image = $name;

                $form->title = $request->title;           
                $form->description = $request->description;
                $form->userId =Auth::user()->id;
                $form->created_at =Carbon::now();
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
        $data=Blog::where('id',$id)->first();
        return response()->json($data);
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
        if ($strpos = strpos($request->image, ';')) {

            $form = Blog::find($id);
            $strpos = strpos($request->image, ';');
            $sub = substr($request->image, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->image)->resize(270, 265);
            $upload_path = public_path() . "/images/";
            $img->save($upload_path . $name);
            $form->image = $name;
            $form->title = $request->title;
         
            $form->description = $request->description;
            $form->userId =Auth::user()->id;
                
            $form->update();
       
        } else {
            $form = Blog::find($id);
            $form->petName = $request->petName;
            $form->title = $request->title;
        
            $form->description = $request->description;
            $form->userId =Auth::user()->id;         
            $form->update();
           
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('id',$id)->delete();
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
