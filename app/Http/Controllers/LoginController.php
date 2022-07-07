<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login,register.login', [
            "title" => "Login"
        ]);
    }
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $email = $request->email;
        $user = User::where('email', $email)->count();
        if ($user > 0) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                Alert::success('Success ', 'Berasil Login');
                return redirect()->intended('/home');
            }
            Alert::toast('email or password invalid', 'error');
            return redirect()->intended('/');
        }
        Alert::toast('unregistered account', 'error');
        return redirect()->intended('/');
    }
    # code...

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
