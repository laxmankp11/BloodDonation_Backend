<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\{Country, State, City, User, Blood_Bank};
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BloodBank_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function add_blood_banks(Request $request)
    {
         if ($request->isMethod('get'))
       {
            $data['countries'] = Country::get(["name", "id"]);
            return view('admin.blood_bank.add', $data);   
       }
       else{
            $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:blood_banks',
            'password' => 'required',
            'phone_no'=>'required|numeric|digits:10|unique:blood_banks',
            'address'=>'required|string|max:2500',
            'city'=>'required|int',
            'state'=>'required|int',
            'country'=>'required|int',
            'profile_status'=>'required',
            'landline_no'=>'digits:11|unique:blood_banks',
            'username'=>'required',
            'status'=>'required'
        ]);
        
        blood_bank::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by_email'=>auth()->user()->email,
            'phone_no'=>$request->phone_no,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'profile_status'=>$request->profile_status,
            'landline_no'=>$request->landline_no,
            'username'=>$request->username,
            'status'=>$request->status
        ]);

        //$credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        //$request->session()->regenerate();
        return redirect()->route('list_blood_banks')
        ->withSuccess('You have successfully registered & logged in!');
        }
    }



    public function edit_blood_banks(Request $request, $id)
    {
         $data1 = DB::table('blood_banks')->where('id', $id)->get();
         $email = $data1[0]->email;
         $phone_no = $data1[0]->phone_no;
         $landline_no = $data1[0]->landline_no;
        if($email==$request->email)
           {
                $email = 'required|string|max:250';
           }
           else{
                $email = 'required|string|max:250|unique:blood_banks';
           }

           if($phone_no==$request->phone_no)
           {
                $phone_no = 'digits:10';
           }
           else{
                $phone_no = 'required|digits:10|unique:blood_banks';
           }

           if($landline_no==$request->landline_no)
           {
                $landline_no = 'digits:11';
           }
           else{
                $landline_no = 'required|digits:11|unique:blood_banks';
           }

         if ($request->isMethod('get'))
       {
            $data["blood_bank"] = DB::table('blood_banks')->where('id', $id)->get();
            $data['countries'] = Country::get(["name", "id"]);
            return view('admin.blood_bank.edit', $data);   
       }
       else{
            $request->validate([
            'name' => 'required|string|max:250',
            'email' => $email,
            'phone_no'=>$phone_no,
            'address'=>'required|string|max:2500',
            'profile_status'=>'required',
            'landline_no'=>$landline_no,
            'username'=>'required',
            'status'=>'required'
        ]);
        
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by_email'=>auth()->user()->email,
            'phone_no'=>$request->phone_no,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'profile_status'=>$request->profile_status,
            'landline_no'=>$request->landline_no,
            'username'=>$request->username,
            'status'=>$request->status
        );

        $up = blood_bank::where('id', $id)
        ->update($data);
        //$credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        //$request->session()->regenerate();
        return redirect()->route('list_blood_banks')
        ->withSuccess('Record successfully Updated!');
        }
    }

     public function delete_blood_banks(Request $request, $id)
    {
        $del = DB::table('blood_banks')->where('id', $id)->delete();
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

    public function list_blood_banks()
    {

    
    $post = DB::table('blood_banks')->get();
     
    //var_dump($post);
     if(sizeof($post)<=0)
    {
        return view('admin.blood_bank.list_blood_banks')->with("data",[]);
    }
    else
    {
        $blood_banks = blood_bank::all();
        return view('admin.blood_bank.list_blood_banks')->with("data",$blood_banks->toQuery()->paginate(5));
    }
  }
}