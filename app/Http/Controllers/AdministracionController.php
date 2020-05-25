<?php

namespace App\Http\Controllers;

use App\Http\Models\Administracion;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    public function login(Request $request)
    {
        $user = Administracion::where('usuario', $request->input('usuario'))
            ->where('pass', $request->input('pass'))
            ->get();
        return json_encode($user);
    }
}
