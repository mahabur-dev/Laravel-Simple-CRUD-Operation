<?php

namespace App\Http\Controllers;
use App\Models\user ;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class userController extends Controller
{
     public function userSignup(){
        return view('userAuth.userSignup');
    }

    public function store(Request $request){

      $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);
        $user = user :: create($validated);

       if($user){
            // If user is created successfully, redirect to login page
            return redirect()->route('userAuth.login');
        } else {
            // If user creation fails, redirect back with an error message
            return back()->withErrors(['error' => 'User registration failed. Please try again.'])->withInput();
        }
    }

    public function login(){
        return view('userAuth.login');
    }

    public function userLogin (Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(Auth::attempt($data)){
            // Authentication passed
            return redirect()->route('projects.index');
        } else {
            // Authentication failed
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput();
        }
    }

    public Function logout(){
        Auth :: logout();
        return redirect()->route('userAuth.login');
    }
}
