<?php

namespace App\Http\Controllers;

use App\Models\Followers;
use App\Models\Mainsubject;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
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
        if(Auth::check()){
            return redirect('/dashboard');
        }
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
                // Checking if invitation cookie is alive or not
//                if(Cookie::has('invite_agent_token') && !empty(Cookie::get('invite_agent_token'))) {
//                    return redirect()->intended('accept-invitation/' . Cookie::get('invite_agent_token'));
//                } elseif(Cookie::has('invite_buyer_token') && !empty(Cookie::get('invite_buyer_token'))) {
//                    return redirect()->intended('accept-invitation-buyer/' . Cookie::get('invite_buyer_token'));
//                } else {
//                    return redirect()->intended('dashboard');
//                }

            }


        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registration()
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }

        return view('auth.register', ["title" => "Create an account"]);
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'user_type' => 'required|in:Buyer,Agent'

        ]);

        $data = $request->all();

        $user = $this->create($data);

        if($user) {
            if($user->user_type == 'Buyer') {
                $user->assignRole('buyer');
            }
        }

        event(new Registered($user));

        return redirect("login")->with('msg', '<p>Please confirm your email to complete the sign up process. </p> <p>We have emailed you a verification</p> <p>Thank you</p> <p>Team Scorng</p>');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'user_type' => $data['user_type'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){

            // Checking if agent invitation cookie is alive or not
            if(\Illuminate\Support\Facades\Session::has('invite_agent_token') && !empty(\Illuminate\Support\Facades\Session::get('invite_agent_token'))) {
                return redirect()->intended('accept-invitation/' . \Illuminate\Support\Facades\Session::get('invite_agent_token'));
            }

            // Checking if buyer invitation cookie is alive or not
            if(\Illuminate\Support\Facades\Session::has('invite_buyer_token') && !empty(\Illuminate\Support\Facades\Session::get('invite_buyer_token'))) {
                return redirect()->intended('accept-invitation-buyer/' . \Illuminate\Support\Facades\Session::get('invite_buyer_token'));
            }
            //----------------------------------------------

            $user = Auth::user();

            if($user->hasRole('buyer')) {
                $mysubjects = DB::table('subjects')
                ->join('agentbuyers', 'subjects.id', '=', 'agentbuyers.subject_id')
                ->where('agentbuyers.user_id', '=', $user->id)
                ->select('subjects.*')
                ->get();

                $otherSubjects = [];
                $agentB = [];
                $agentA = [];
            } else {
                $mysubjects = Subject::with('team')
                ->where('user_id', '=', $user->id)
                ->get();


                $agentB = Followers::where('who_follow', '=', $user->id)
                    ->select('who_follow')
                    ->get();

                $agentA = Followers::where('whom_follow', '=', $user->id)
                    ->select('whom_follow')
                    ->get();


            }

            return view('auth.dashboard', ["title" => "Company Dashboard", "user" => $user, "mysubjects" => $mysubjects, 'agentB' => $agentB, 'agentA' => $agentA]);
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
