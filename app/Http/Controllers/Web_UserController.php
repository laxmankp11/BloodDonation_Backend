<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\Web_User;
use App\Models\{Country, State, City, User};
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Web_UserController extends Controller
{
    public function add_web_users(Request $request)
    {
         if ($request->isMethod('get'))
       {
            $data['countries'] = Country::get(["name", "id"]);
            return view('admin.web_users.add', $data);   
       }
       else{
            $request->validate([
            'name' => 'required|string|max:250',
            'patient_name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:web_users',
            'password' => 'required',
            'phone_no'=>'required|numeric|digits:10|unique:web_users',
            'blood_type'=>'required|string|max:250',
            'address'=>'required|string|max:2500',
            'city'=>'required|int',
            'state'=>'required|int',
            'country'=>'required|int',
            'profile_status'=>'required',
            'status'=>'required'
        ]);
        
        Web_User::create([
            'name' => $request->name,
            'patient_name' => $request->patient_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by_email'=>auth()->user()->email,
            'phone_no'=>$request->phone_no,
            'blood_type'=>$request->blood_type,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'profile_status'=>$request->profile_status,
            'status'=>$request->status
        ]);

        //$credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        //$request->session()->regenerate();
        return redirect()->route('list_web_users')
        ->withSuccess('You have successfully registered & logged in!');
        }
    }



    public function edit_web_users(Request $request, $id)
    {
         $data1 = DB::table('web_users')->where('id', $id)->get();
         $email = $data1[0]->email;
         $phone_no = $data1[0]->phone_no;
        if($email==$request->email)
           {
                $email = 'required|string|max:250';
           }
           else{
                $email = 'required|string|max:250|unique:web_users';
           }

           if($phone_no==$request->phone_no)
           {
                $phone_no = 'required|string|max:250';
           }
           else{
                $phone_no = 'required|string|max:250|unique:web_users';
           }

         if ($request->isMethod('get'))
       {
            $data["web_users"] = DB::table('web_users')->where('id', $id)->get();
            $data['countries'] = Country::get(["name", "id"]);
            return view('admin.web_users.edit', $data);   
       }
       else{
            $request->validate([
            'name' => 'required|string|max:250',
            'patient_name' => 'required|string|max:250',
            'email' => $email,
            //'password' => 'required',
            'phone_no'=>$phone_no,
            'blood_type'=>'required|string|max:250',
            'address'=>'required|string|max:2500',
            //'city'=>'required|int',
            //'state'=>'required|int',
            //'country'=>'required|int',
            'profile_status'=>'required',
            'status'=>'required'
        ]);
        
        $data = array(
            'name' => $request->name,
            'patient_name' => $request->patient_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by_email'=>auth()->user()->email,
            'phone_no'=>$request->phone_no,
            'blood_type'=>$request->blood_type,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'profile_status'=>$request->profile_status,
            'status'=>$request->status
        );

        $up = Web_User::where('id', $id)
        ->update($data);
        //$credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        //$request->session()->regenerate();
        return redirect()->route('list_web_users')
        ->withSuccess('Record successfully Updated!');
        }
    }

     public function delete_web_users(Request $request, $id)
    {
        $del = DB::table('web_users')->where('id', $id)->delete();
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

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function list_web_users()
    {    
    $post = DB::table('web_users')->get();
     
    //var_dump($post);
     if(sizeof($post)<=0)
    {
        return view('admin.web_users.list_web_users')->with("data",[]);
    }
    else
    {
        $web_users = Web_User::all();
        return view('admin.web_users.list_web_users')->with("data",$web_users->toQuery()->paginate(5));
    }
  }
}