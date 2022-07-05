<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
Use Alert;
class RegisterController extends Controller
{
    public function index(){
        return view('login,register.register',[
        "title" => "Register"
        ]);
    }
    public function store(Request $request){
        $password = $request->password;
        $hash = Hash::make($password);
        $data = new User();
        $data->name = $request->username;
        $data->email = $request->email;
        $data->password = $hash;
        $data->save();
        Alert::success('Success ', 'Data user berhasil di tambahkan');
        return redirect('/register');
   }
   public function update(Request $request, $id){
    dd($request);
   }
}
