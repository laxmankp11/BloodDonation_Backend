<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class

class LoginRegisterController extends Controller
{

    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        // $this->middleware('guest')->except([
        //     'logout', 'dashboard'
        // ]);
        // $this->middleware('guest')->except([
        //     'logout', 'dashboard'
        // ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('admin.auth.register');
    }

    public function list_sub_admin()
    {

       /* $posts = User::all();

       $posts->each(function($post) // foreach($posts as $post) { }
{
var_dump($post["name"]);
});*/
    
    $post = DB::table('users')->get();
     
    //var_dump($post);
     if(sizeof($post)<=0)
{
return view('admin.admin_userlist')->with("data",[]);
}
else
{
    $users = User::where("type","sub_admin")->get();
    return view('admin.admin_userlist')->with("data",$users->toQuery()->paginate(5));
}
    //$post = DB::table('users')->get()->paginate(15);
     //$users = User::all();
    //var_dump($post);
    return view('admin.admin_userlist')->with("data",$users->toQuery()->paginate(5));
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type'=>'sub_admin',
            'created_by_email'=>auth()->user()->email
        ]);

        $credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        //$request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }


    public function edit_admin_user(Request $request, $id)
    {
       $data = DB::table('users')->where('id', $id)->get();
       $email = $data[0]->email;
       if ($request->isMethod('get'))
       {            
            return view("admin.edit_admin_user")->with("data",$data);
       }
       else{

         if($email==$request->email)
           {
                $email = 'required|string|max:250';
           }
           else{
                $email = 'required|string|max:250|unique:users';
           }

            $request->validate([
            'name' => 'required|string|max:250',
            'email' => $email,
            //'password' => 'required|min:8|confirmed'
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'status'=>$request->status
            //'password' => Hash::make($request->password)
        );
        $up = User::where('id', $id)
        ->update($data);
        if($up)
        {
            return redirect()->route('list_sub_admin')
        ->withSuccess('Record Updated Successfully!');
        }
       }

    }

    public function delete_admin_user(Request $request, $id)
    {
        $del = DB::table('users')->where('id', $id)->delete();
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



    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    } 
    
    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            //return view('auth.dashboard');
            return view('admin.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

    public function rights_old(Request $request, $id)
    {

        return view('admin.auth.rights');
    }

    public function rights(Request $request, $id)
    {
       $dt1 = DB::table('users')->where('id', $id)->get();
       $rights1 = $dt1[0]->rights;
       $pages = DB::table("pages")->get();
       $data = [];
       $data["admin_user"] = $dt1;
       $data["pages"] = $pages;
       if ($request->isMethod('get'))
       {            
            return view("admin.auth.rights")->with("data",$data);
       }
       else{

        
               // $rights1 = 'required';
           

            $request->validate([
            'rights' => 'required',
            //'password' => 'required|min:8|confirmed'
        ]);
        $data = array(
            'rights' => implode(",",$request->rights)
        );
        $up = User::where('id', $id)
        ->update($data);
        if($up)
        {
            return redirect()->route('list_sub_admin')
        ->withSuccess('Record Updated Successfully!');
        }
       }

    }    

}