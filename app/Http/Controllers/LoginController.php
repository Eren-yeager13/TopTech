<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\site;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   
    
    public function index(Request $request)
    {
        $responsable = Responsable::where('login_resp', $request->login_resp)
            ->where('password', $request->password) // Check if the password matches 
            ->first();
        // Check if a Responsable was found with the provided credentials
        if ($responsable) {
            // Log in the user using Auth::loginUsingId
            Auth::loginUsingId($responsable->id);
            // Redirect to the dashboard route upon successful login
            return redirect()->route('dashboard',);
        } else {
            // Redirect back to the login page with an error message and input values
            return redirect()->back()->withInput()->withErrors(['error'=>'Le nom d\'utilisateur ou le mot de passe est incorrect.']);
        }
    }
    public function logout(){
        // Flush all session data
        Session::flush();
        // Log out the currently authenticated user
        Auth::logout();
         // Redirect to the login route
        return redirect()->route('login');

    }
}
