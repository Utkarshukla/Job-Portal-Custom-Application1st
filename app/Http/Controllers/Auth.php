<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Redirct\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Controllers\InsertController;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Redirect;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{
    public function usershow()
    {
        //getting login page
        return view('login');
    }
    public function userlog(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put([

                    'loginId' => $user->id,
                    'name' => $user->fname,
                    'email' => $user->email,
                    'phone' => $user->phone,

                    'updates' => $user->updated_at
                ]);
                return redirect('/');
            } else {

                return back()->with('fail', 'Incorrect Password!');
            }
        } else {
            return back()->with('fail', 'This email is not registered yet!');
        }
    }

    public function user_form()
    {
        //getting signup page 
        return view('signup');
    }
    public function usernew(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:10|max:13|unique:users,phone',
            'password' => 'required|min:6'
        ]);
       

        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password); //hashing password
        $user->created_at = date('Y-m-d H:i:s');

        $res = $user->save();
        if ($res) {
            return back()->with('success', 'you have registered! :)');
        } else {
            return back()->with('fail', 'something worng with user-new');
        }
    }
    public function logout()
    {
        if (Session::has('name')) {
            Session::flush();
            // Auth::logout();
            return redirect('/login');
        } else {
            return redirect('/login');
        }
    }

    public function updates(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|min:10|max:13',
            'password' => 'required|min:6'
        ]);
        $email = $request->email;
        $phone = $request->phone;
        $password = Hash::make($request->password); //hashing password
        $created_at =$request-> date('Y-m-d H:i:s');
        
        

        $userup=User::where('id', '=', session('loginId'))->update([
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
            'created_at' => $created_at,
        ]);
        if(Session::has('loginId')){
            Session::flush();
        }
        $request->session()->put([

            'loginId'=>$request->id,
            'name'=>$request->fname,
            'email' => $request->email,
            'phone' => $request->phone,

            'updates' => $request->updated_at
        ]);

        return back()->with('success', 'updated');
    }
}
