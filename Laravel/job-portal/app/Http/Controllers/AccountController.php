<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    // This method will show user registration page

    public function registration() {

        return view('font.account.registration');

    }

    // This method will save a user

    public function processRegistration(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:cnfrm_password',
            'cnfrm_password' => 'required',
        ]);
        
        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // $user ->cnfrm_password = $request->cnfrm_password;
            
            $user ->save();

            session()->flash('success', 'You have registered successfully.');


            return response()->json([
                'status' => true,
                'errors' =>[]
            ]); 
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
        

    }

    // This method will show user login page

    public function login() {
        return view('font.account.login');
    }

    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.profile');
            } else {
                return redirect()->route('account.login')->with('error','Either Email/Password is incorrect');
            }
            
           
        } else {
           return redirect()->route('account.login')
           ->withErrors($validator)
           ->withInput($request->only('email'));
        }
        
    }

    public function profile(){
       return view('font.account.profile');
    }

    
    public function logout(){
       Auth::logout();
        return redirect()->route('account.login');
     }
}
