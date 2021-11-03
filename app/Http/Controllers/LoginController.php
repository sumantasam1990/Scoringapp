<?php

namespace App\Http\Controllers;

use App\Models\Mainsubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{

    public function login() {
        return view('auth.login', ["title" => "Login"]);
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            if (Auth::user()->user_type == 'Administrator')
            {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->intended('dashboard');
            }


        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registration()
    {
        return view('auth.register', ["title" => "Create an account"]);
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $data = $request->all();

        $user = $this->create($data);

        event(new Registered($user));

        return redirect("login")->with('msg', '<p>Please confirm your email to complete the sign up process. </p> <p>We have emailed you a verification</p> <p>Thank you</p> <p>Team Scorng</p>');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            $user = Auth::user();

            $mysubjects = Subject::with('team')
                ->where('user_id', '=', $user->id)
                ->get();

            return view('auth.dashboard', ["title" => "Company Dashboard", "user" => $user, "mysubjects" => $mysubjects]);
        }

        return redirect("registration")->with('err', 'You are not allowed to access');
    }

    public function uploadPhoto(Request $request)
    {
        if ($request->has('image')) {

            $imageName = 'sca_' . uniqid() . time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);

            try {
                User::where('id', '=', Auth::user()->id)
                    ->update(['photo' => $imageName]);
                return back();
            } catch (\Throwable $th) {
                return back()
                    ->with('err', 'Error! ' . $th->getMessage());
            }
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
