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

        // Retrieve the currently authenticated user...
        //$user = Auth::user();

        // Retrieve the currently authenticated user's ID...
        //$id = Auth::id();

        // if (Auth::check()) {
        //     // The user is logged in...
        // }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
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
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        //event(new Registered($user));

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

            $mysubjects = DB::select('SELECT DISTINCT(mainsubjects.main_subject_name), mainsubjects.id FROM mainsubjects RIGHT JOIN teams ON (teams.mainsubject_id=mainsubjects.id) WHERE teams.user_id = ?', [$user->id]);



            return view('auth.dashboard', ["title" => "Company Dashboard", "user" => $user, "mysubjects" => $mysubjects]);
        }

        return redirect("registration")->with('err', 'You are not allowed to access');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
