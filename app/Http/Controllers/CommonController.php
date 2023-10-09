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

   public static function check_link($link_id, $arr1)
    {
       $arr = explode(",",$arr1);
       foreach($arr as $key=>$arr2)
       {
         $arr_new = explode("_",$arr2);
         $new_arr[] = $arr_new[1];
       }
       //print_r($new_arr);
       if (in_array($link_id, $new_arr))
  {
     return true;
  }
  else
  {
   return false;
  }
    }



  public static function check_list_permission($opr, $arr1)
    {

       $arr = explode(",",$arr1);
       //var_dump($arr);
       //die;
       $last_url = last(request()->segments());
       $s = $data = DB::table('pages')->where('url_route', $last_url)->get();
       $page_id = $s[0]->id;
       foreach($arr as $key=>$arr2)
       {
         $arr_new = explode("_",$arr2);
         $new_arr[] = $arr_new[1];
         $opr_arr[] = $arr_new[0];
       }
       //print_r($new_arr);
       if (in_array($opr, $opr_arr) && in_array($page_id, $new_arr))
  {
     return true;
  }
  else
  {
   return false;
  }
    }

public static function added_by($email)
{
    $user = DB::table("users")->where("email",$email)->get();
    if(sizeof($user)>0)
    {
      return $user[0]->name;
    }
    else{
      return "Unknown";
    }
}

public static function get_state($state)
{
    $user = DB::table("states")->where("id",$state)->get();
    if(sizeof($user)>0)
    {
      return $user[0]->name;
    }
    else{
      return "Unknown";
    }
}

  public static function get_city($city)
{
    $user = DB::table("cities")->where("id",$city)->get();
    if(sizeof($user)>0)
    {
      return $user[0]->name;
    }
    else{
      return "Unknown";
    }
}


public static function get_state_id($state)
{
    $user = DB::table("states")->where("id",$state)->get();
    if(sizeof($user)>0)
    {
      return $user[0]->id;
    }
    else{
      return "Unknown";
    }
}

  public static function get_city_id($city)
{
    $user = DB::table("cities")->where("id",$city)->get();
    if(sizeof($user)>0)
    {
      return $user[0]->id;
    }
    else{
      return "Unknown";
    }
}

  public static function get_country($country)
{
    $user = DB::table("countries")->where("id",$country)->get();
    if(sizeof($user)>0)
    {
      return $user[0]->name;
    }
    else{
      return "Unknown";
    }
}

}