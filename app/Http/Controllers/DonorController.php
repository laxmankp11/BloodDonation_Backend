<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\{Country, State, City, User, Donor};
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function add_donors(Request $request)
    {
         if ($request->isMethod('get'))
       {
            $data['countries'] = Country::get(["name", "id"]);
            return view('admin.donor.add', $data);   
       }
       else{
            $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:donors',
            'password' => 'required',
            'phone_no'=>'required|numeric|digits:10|unique:donors',
            'blood_type'=>'required|string|max:250',
            'address'=>'required|string|max:2500',
            'city'=>'required|int',
            'state'=>'required|int',
            'country'=>'required|int',
            'profile_status'=>'required',
            'landline_no'=>'digits:10|unique:donors',
            'username'=>'required',
            'is_available_to_donate'=>"required",
            "profile_pic"=>"",
            "is_visible_contact_detail"=>"required",
            'status'=>'required'
        ]);
        
        $profile_pic = '';
        Donor::create([
            'name' => $request->name,
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
            'landline_no'=>$request->landline_no,
            'username'=>$request->username,
            'is_available_to_donate'=>$request->is_available_to_donate,
            "profile_pic"=>$profile_pic,
            "is_visible_contact_detail"=>$request->is_visible_contact_detail,
            'status'=>$request->status
        ]);

        //$credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        //$request->session()->regenerate();
        return redirect()->route('list_donors')
        ->withSuccess('You have successfully registered & logged in!');
        }
    }



    public function edit_donors(Request $request, $id)
    {
         $data1 = DB::table('donors')->where('id', $id)->get();
         $email = $data1[0]->email;
         $phone_no = $data1[0]->phone_no;
        if($email==$request->email)
           {
                $email = 'required|string|max:250';
           }
           else{
                $email = 'required|string|max:250|unique:donors';
           }

           if($phone_no==$request->phone_no)
           {
                $phone_no = 'required|string|max:250';
           }
           else{
                $phone_no = 'required|string|max:250|unique:donors';
           }

         if ($request->isMethod('get'))
       {
            $data["donor"] = DB::table('donors')->where('id', $id)->get();
            $data['countries'] = Country::get(["name", "id"]);
            return view('admin.donor.edit', $data);   
       }
       else{
            $request->validate([
            'name' => 'required|string|max:250',
            'email' => $email,
            //'password' => 'required',
            'phone_no'=>$phone_no,
            'blood_type'=>'required|string|max:250',
            'address'=>'required|string|max:2500',
            //'city'=>'required|int',
            //'state'=>'required|int',
            //'country'=>'required|int',
            'profile_status'=>'required',
            'landline_no'=>'digits:10|unique:donors',
            'username'=>'required',
            'is_available_to_donate'=>"required",
            "profile_pic"=>"",
            "is_visible_contact_detail"=>"required",
            'status'=>'required'
        ]);
        
        $data = array(
            'name' => $request->name,
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
            'landline_no'=>$request->landline_no,
            'username'=>$request->username,
            'is_available_to_donate'=>$request->is_available_to_donate,
            "profile_pic"=>$profile_pic,
            "is_visible_contact_detail"=>$request->is_visible_contact_detail,
            'status'=>$request->status
        );

        $up = Donor::where('id', $id)
        ->update($data);
        //$credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        //$request->session()->regenerate();
        return redirect()->route('list_donors')
        ->withSuccess('Record successfully Updated!');
        }
    }

     public function delete_donors(Request $request, $id)
    {
        $del = DB::table('donors')->where('id', $id)->delete();
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

    public function list_donors()
    {

    
    $post = DB::table('donors')->get();
     
    //var_dump($post);
     if(sizeof($post)<=0)
    {
        return view('admin.donor.list_donors')->with("data",[]);
    }
    else
    {
        $donors = Donor::all();
        return view('admin.donor.list_donors')->with("data",$donors->toQuery()->paginate(5));
    }
  }
}