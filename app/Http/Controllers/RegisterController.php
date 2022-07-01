<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RegisterController extends Controller
{
    public function index(){
        return view('login,register.register',[
        "title" => "Register"
        ]);
    }
    public function store(Request $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->save();
   }
   public function update(Request $request, $id){
    dd($request);
   }
}
