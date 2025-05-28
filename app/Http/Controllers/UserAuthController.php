<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\userAuth ;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
     
    public function signup(){
        return view('userAuth.signup');
    }

    public function store(Request $request){
        $request->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'email' => 'required|email|unique:auth_table,email',
            'phoneNumber' => 'required|regex:/^[0-9+\-\s]+$/',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'password' => 'required|min:6|confirmed',
        ]);

        $imagename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('userAuth'), $imagename);


        $userAuth = new userAuth();
        $userAuth->firstName = $request->firstName;
        $userAuth->lastName = $request->lastName;
        $userAuth->email = $request->email;
        $userAuth->image = $imagename;
        $userAuth->password = Hash::make($request->password);;
        $userAuth->phoneNumber = $request->phoneNumber;
        
        $userAuth->save();
        return redirect()->route('userAuth.login');


    }

    public function login(){
        return view('userAuth.login');
    }

    public function authenticate(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = userAuth::where('email', $request->email)->first();
      
        // Check if user exists and password matches
        if ($user && Hash::check($request->password, $user->password)) {
            // Authentication passed
            return redirect()->route('projects.index');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput();
        }
    }
}
