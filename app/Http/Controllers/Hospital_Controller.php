<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\{Country, State, City, User, Hospitals};
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Hospital_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function add_hospitals(Request $request)
    {
         if ($request->isMethod('get'))
       {
            $data['countries'] = Country::get(["name", "id"]);
            return view('admin.hospitals.add', $data);   
       }
       else{
       // echo 'hello';die();
            $request->validate([
            'name' => 'required|string|max:250',
            'hospital_type'=>'required',
            'email' => 'required|email|max:250|unique:hospitals',
            'password' => 'required',
            'phone_no'=>'required|numeric|digits:10|unique:hospitals',
            'address'=>'required|string|max:2500',
            'city'=>'required|int',
            'state'=>'required|int',
            'country'=>'required|int',
            'zipcode'=>'required|digits:6',
            'contact_person_name'=>'required|string',
            'contact_person_position'=>'required|string',
            'contact_person_phone_no'=>'required|digits:10',
            'contact_person_email'=>'required',
            'is_blood_bank'=>'required',
            'license_no'=>'',
            'blood_donation_units_monthly'=>'required',
            'hospital_partners_reason'=>'required|max:3000',
            'requirement_from_partenrship'=>'required|max:3000',
            'share_info_via_app'=>"required",
            'cooperate_agree'=>"required",
            'signature'=>"required",
            'terms_agreement'=>"required",
            'status'=>'required'
        ]);
         if($_FILES['signature']){
          $signature = time() . '.' . $request->signature->extension();
          $request->signature->move(public_path('uploads/signature'), $signature);
        }
        else{
            $signature = '';
        }
        Hospitals::create([
            'name' => $request->name,
            'hospital_type' => $request->hospital_type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by_email'=>auth()->user()->email,
            'phone_no'=>$request->phone_no,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'zipcode'=>$request->zipcode,
            'website'=>$request->website,
            'contact_person_name'=>$request->contact_person_name,
            'contact_person_position'=>$request->contact_person_position,
            'contact_person_phone_no'=>$request->contact_person_phone_no,
            'contact_person_email'=>$request->contact_person_email,
            'is_blood_bank'=>$request->is_blood_bank,
            'license_no'=>$request->license_no,
            'blood_donation_units_monthly'=>$request->blood_donation_units_monthly,
            'hospital_partners_reason'=>$request->hospital_partners_reason,
            'requirement_from_partenrship'=>$request->requirement_from_partenrship,
            'share_info_via_app'=>$request->share_info_via_app,
            'cooperate_agree'=>$request->cooperate_agree,
            'signature'=>$signature,
            'terms_agreement'=>$request->terms_agreement,
            'status'=>$request->status
        ]);

        //$credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        //$request->session()->regenerate();
        return redirect()->route('list_hospitals')
        ->withSuccess('You have successfully registered & logged in!');
        }
    }



    public function edit_hospitals(Request $request, $id)
    {
         $data1 = DB::table('hospitals')->where('id', $id)->get();
         $email = $data1[0]->email;
         $phone_no = $data1[0]->phone_no;
        if($email==$request->email)
           {
                $email = 'required|string|max:250';
           }
           else{
                $email = 'required|string|max:250|unique:hospitals';
           }

           if($phone_no==$request->phone_no)
           {
                $phone_no = 'required|string|max:250';
           }
           else{
                $phone_no = 'required|string|max:250|unique:hospitals';
           }

         if ($request->isMethod('get'))
       {
            $data["hospitals"] = DB::table('hospitals')->where('id', $id)->get();
            $data['countries'] = Country::get(["name", "id"]);
            return view('admin.hospitals.edit', $data);   
       }
       else{
            $request->validate([
            'name' => 'required|string|max:250',
            'email' => $email,
            'password' => 'required',
            'phone_no'=>$phone_no,
            'address'=>'required|string|max:2500',
            'city'=>'required|int',
            'state'=>'required|int',
            'country'=>'required|int',
            'zipcode'=>'required|digits:6',
            'contact_person_name'=>'required|string',
            'contact_person_position'=>'required|string',
            'contact_person_phone_no'=>'required|digits:10',
            'contact_person_email'=>'required',
            'is_blood_bank'=>'required',
            //'license_no'=>'',
            'blood_donation_units_monthly'=>'required',
            'hospital_partners_reason'=>'required|max:3000',
            'requirement_from_partenrship'=>'required|max:3000',
            'share_info_via_app'=>"required",
            'cooperate_agree'=>"required",
            //'signature'=>"required",
            'terms_agreement'=>"required",
            'status'=>'required'
        ]);
        
        if($request->hasFile('signature'))
        {
            $signature = time() . '.' . $request->signature->extension();
            $request->signature->move(public_path('uploads/signature'), $signature);
        }
        else{
            $signature = $request->signature_text;
        }

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
            'zipcode'=>$request->zipcode,
            'website'=>$request->website,
            'contact_person_name'=>$request->contact_person_name,
            'contact_person_position'=>$request->contact_person_position,
            'contact_person_phone_no'=>$request->contact_person_phone_no,
            'contact_person_email'=>$request->contact_person_email,
            'is_blood_bank'=>$request->is_blood_bank,
            'license_no'=>$request->license_no,
            'blood_donation_units_monthly'=>$request->blood_donation_units_monthly,
            'hospital_partners_reason'=>$request->hospital_partners_reason,
            'requirement_from_partenrship'=>$request->requirement_from_partenrship,
            'share_info_via_app'=>$request->share_info_via_app,
            'cooperate_agree'=>$request->cooperate_agree,
            //'signature'=>$signature,
            'terms_agreement'=>$request->terms_agreement,
            'status'=>$request->status
        );

        $up = Hospitals::where('id', $id)
        ->update($data);
        //$credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        //$request->session()->regenerate();
        return redirect()->route('list_hospitals')
        ->withSuccess('Record successfully Updated!');
        }
    }

     public function delete_hospitals(Request $request, $id)
    {
        $del = DB::table('hospitals')->where('id', $id)->delete();
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

    public function list_hospitals()
    {    
    $post = DB::table('hospitals')->get();
     
    //var_dump($post);
     if(sizeof($post)<=0)
    {
        return view('admin.hospitals.list_hospitals')->with("data",[]);
    }
    else
    {
        $hospitals = Hospitals::all();
        return view('admin.hospitals.list_hospitals')->with("data",$hospitals->toQuery()->paginate(5));
    }
  }
}