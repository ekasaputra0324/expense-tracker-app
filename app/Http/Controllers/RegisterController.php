<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('login,register.register',[
        "title" => "Register"
        ]);
    }
    public function store(Request $request){
        dd($request);
    }
}
