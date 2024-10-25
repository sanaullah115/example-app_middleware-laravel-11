<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register()
    {
        return view('register');
    }

    public function Registersave(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        // $imagename = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('userimages'), $imagename);
        // $user->image = $imagename;
        $user->save();
        if ($user) {
            return redirect()->route('login');
        }
    }
    public function login()
    {
        return view('login');
    }


    public function loginuser(Request $request)
    {


        $request->validate([
            'email' => 'string|required|email',
            'password' => 'required|String',
        ]);

        
        $userCredential = $request->only('email', 'password');
        if (Auth::attempt($userCredential)) {
            $route = $this->redirectDashboard();
            return redirect($route);
        } else {
            return back()->with('error', 'Email And Password is incorrect.');
        }
    }


    

    public function redirectDashboard()
    {
        $redirect = '';

        if (Auth::User() && Auth::User()->roleid_fk == 1) {
            $redirect = '/Admin/dashbaord';
        } else {
            $redirect = '/dashbaord';
        }
        return  $redirect;

    }


    public function dashboardpage()
    {

        return view('dashboard');
    }


    // public function allowpage()
    // {

    //     if (Auth::check()) {
    //         return view('allowpage');
    //     } else {
    //         return redirect()->route('login');
    //     }
    // }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
