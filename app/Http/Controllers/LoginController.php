<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $check = $this->create($data);

        return redirect("login")->with('msg', 'You have successfully registered.');
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
            $mysubjects = User::find($user->id)->subject;
            //dd($mysubjects);
            $invited = DB::select('select subjects.subject_name, subjects.id from subjects left join teams on (teams.subject_id=subjects.id) where teams.user_id = ?', [$user->id]);
            return view('auth.dashboard', ["title" => "Company Dashboard", "user" => $user, "invited" => $invited, "mysubjects" => $mysubjects]);
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
