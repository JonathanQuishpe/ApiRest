<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Usuarios;

class UsuariosController extends Controller{
    public function index(){
        $user = Usuarios::get();
        echo (json_encode($user)); 
    }

    public function store(Request $request){
        $user = new Usuarios();
        $user->names = $request->input('names');
        $user->lastnames = $request->input('lastnames');
        $user->email = $request->input('email');
        $user->user = $request->input('user');
        $user->pass = $request->input('password');
        $user->save();
        echo json_encode($user);

    }

    public function update(Request $request, $id){
        $user = Usuarios::find($id);
        $user->names = $request->input('names');
        $user->lastnames = $request->input('lastnames');
        $user->email = $request->input('email');
        $user->user = $request->input('user');
        $user->pass = $request->input('pass');
        $user->save();
        echo json_encode($user);
    }

    public function destroy($id){
        $movie = Usuarios::find($id);
        $movie->delete();
    }

    public function show($id){
        $user = Usuarios::find($id);
        echo json_encode($user);
    }

    public function login(Request $request){
        $user = Usuarios::select('user')
                        ->where('email',$request->input('email'))
                        ->where('pass',$request->input('password'))
                        ->get();
        echo json_encode($user);

    }
}
