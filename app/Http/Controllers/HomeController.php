<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function viewPost()
    { 
        if(Auth::user()){
        $data=Pet::withCount('like')->with('pet','user','like.userlike','authlike','location','color')->orderby('id','desc')->get();
        }
        else{
            $data=Pet::withCount('like')->with('pet','user','location','color')->orderby('id','desc')->get(); 
        }
        return ['data'=>$data];
    }
    public function viewBlog()
    { 
       
            $data=Blog::with('user')->orderby('id','desc')->get(); 
        
        return ['data'=>$data];
    }
    public function searchPost($data)
    { 
        if(Auth::user()){
        $data=Pet::withCount('like')->with('pet','user','like.userlike','authlike','location','color')->orderby('id','desc')->where('description','LIKE', "%$data%")->orwhere('color','LIKE', "%$data%")->orwhere('petName','LIKE', "%$data%")->orwhere('location','LIKE', "%$data%")->get();
        }
        else{
            $data=Pet::withCount('like')->with('pet','user','location','color')->orderby('id','desc')->where('description','LIKE', "%$data%")->orwhere('color','LIKE', "%$data%")->orwhere('petName','LIKE', "%$data%")->orwhere('location','LIKE', "%$data%")->get(); 
        }
        return ['data'=>$data];
    }
    public function searchCategory($id)
    { 
        if(Auth::user()){
        $data=Pet::withCount('like')->with('pet','user','like.userlike','authlike','location','color')->orderby('id','desc')->where('petType',$id)->get();
        }
        else{
            $data=Pet::withCount('like')->with('pet','user','location','color')->orderby('id','desc')->where('petType',$id)->get(); 
        }
        return ['data'=>$data];
    }
    public function viewUserPost($id)
    { 
        if(Auth::user()){
        $data=Pet::withCount('like')->with('pet','user','like.userlike','authlike','location','color')->orderby('id','desc')->where('userId',$id)->get();
        }
        else{
            $data=Pet::withCount('like')->with('pet','user','location','color')->orderby('id','desc')->where('userId',$id)->get(); 
        }
        return ['data'=>$data];
    }
    public function viewUserBlogPost($id)
    { 
      
            $data=Blog::with('user')->orderby('id','desc')->where('userId',$id)->get(); 
        
        return ['data'=>$data];
    }
    public function myPostGet()
    { 
    
        $data=Pet::withCount('like')->with('pet','user','like.userlike','authlike','location','color')->orderby('id','desc')->where('userId',Auth::user()->id)->get();
     
        return ['data'=>$data];
    }
    public function myBlogPostGet()
    { 
    
        $data=Blog::with('user')->orderby('id','desc')->where('userId',Auth::user()->id)->get();
     
        return ['data'=>$data];
    }
    public function authInfo()
    {  $info=Auth::user();
        return['info'=>$info];
    }
}
