<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class

class PagesController extends Controller
{

   
   public function __construct()
    {
        $this->middleware('auth');   
    }

    
    public function list_pages()
    {

       /* $posts = User::all();

       $posts->each(function($post) // foreach($posts as $post) { }
{
var_dump($post["name"]);
});*/
    
    //$post = DB::table('pages')->get()->paginate(15);
     $pages =Pages::all();
    //var_dump($post);
     if(empty($pages)){ 
        return view('admin.pages.list')->with("data",$pages);
    }
    else{
        return view('admin.pages.list')->with("data",$pages->toQuery()->paginate(5));
    }
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add_page()
    {
        return view('admin.pages.add_page');
    }

    public function submit_page(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:250|unique:pages',
            'status' => 'required|string|max:250',
            'url_route' => 'required|string|max:250|unique:pages',

        ]);

        Pages::create([
            'title' => $request->title,
            'status'=>$request->status,
            'url_route'=>$request->url_route
        ]);
        return redirect()->route('list_pages')
        ->withSuccess('Page Added Successfully.');
    }


    public function edit_page(Request $request, $id)
    {
        $data = DB::table('pages')->where('id', $id)->get();
        $title_db = $data[0]->title;
        $url_route = $data[0]->url_route;
       if ($request->isMethod('get'))
       {
            
            return view("admin.pages.edit_page")->with("data",$data);
       }
       else{
           if($title_db==$request->title)
           {
                $title = 'required|string|max:250';
           }
           else{
                $title = 'required|string|max:250|unique:pages';
           }

           if($url_route==$request->url_route)
           {
                $url_route = 'required|string|max:250';
           }
           else{
                $url_route = 'required|string|max:250|unique:pages';
           }
           
           //echo $title;die;
           $request->validate([
            'title' => $title,
            'status' => 'required|string|max:250',
            'url_route'=>$url_route
        ]);
        $data = array(
            'title' => $request->title,
            'status' => $request->status,
            'url_route'=>$request->url_route
            //'password' => Hash::make($request->password)
        );
        $up = Pages::where('id', $id)
        ->update($data);
        if($up)
        {
            return redirect()->route('list_pages')
        ->withSuccess('Record Updated Successfully!');
        }
       }

    }

    public function delete_page(Request $request, $id)
    {
        $del = DB::table('pages')->where('id', $id)->delete();
        if($del)
        {
            return redirect()->back()
        ->withSuccess('Record Deleted Successfully!');
        }
        else{
             return redirect()->back()
        ->withSuccess('Something Went Wrong');
        }
    }   

}