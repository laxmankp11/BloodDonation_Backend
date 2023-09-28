<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class
use Illuminate\Support\Facades\Route;

class CommonController extends Controller
{

   
    public function __construct()
    {
       
    }

    public static function pages_list()
    {
        $pages =Pages::all();
        return $pages;
    }

    public static function check_routes($route)
    {
      $routee = Route::has($route);
      if($routee==1)
      {
        return url('').'/'.$route;
      }
      else{
        return url('').'/dashboard';
      }
    }

}