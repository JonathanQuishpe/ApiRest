<?php

namespace App\Http\Controllers;

use App\Http\Models\Contrato;
use Illuminate\Http\Request;

class ContratoController extends Controller
{

    public function guardar(Request $request)
    {
        $contrato = new Contrato();
        $contrato->nombre = $request->input('nombre');
        $contrato->direccion = $request->input('direccion');
        $contrato->telefono = $request->input('telefono');
        $contrato->id_categoria = $request->input('categoria');
        $contrato->id_proveedor = $request->input('proveedor');
        $contrato->id_usuario = $request->input('usuario');
        $contrato->fecha = $request->input('fecha');
        $contrato->estado = $request->input('estado');
        $contrato->save();
        echo json_encode($contrato);
    }

}
