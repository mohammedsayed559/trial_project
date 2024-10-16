<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.signupForm');
    }
    public function store(AuthRequest $request){
        $data = $request->validated();
        if($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $imageExtension = $request->file('image')->getClientOriginalExtension();
            if (str_contains($imageName, $imageExtension)) {
                $imageName = explode('.', $imageName);
                $imageName = $imageName[0] . '.' . $imageExtension;
            } else {
                $imageName = $imageName[0] . '.' . $imageExtension;
            }
            $image = $request->file('image')->storeAs('images', $imageName);
            $data['image'] = $image;
        }
            $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('home');

    }
    public function login(){
        return view('auth.loginForm');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $is_login = Auth::attempt(['email'=>$request->email ,'password'=>$request->password]);
        if(!$is_login){
          return redirect()->route('login')->with('msg','may be email or password wrong');
        }
        if(Auth::user()->role == 'admin'){
            return redirect()->route('index');
        }
        else{
            return redirect()->route('home');
        }


    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
