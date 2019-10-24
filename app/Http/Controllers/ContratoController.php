<?php

namespace App\Http\Controllers;

use App\Http\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function lista($id)
    {
        $listado = Contrato::select("categorias.nombre AS nombre_categoria",
            DB::raw('CONCAT(proveedors.nombres, " ", proveedors.apellidos) AS nombre_proveedor'),
            "proveedors.id AS id_proveedor", "contratos.id AS id_contrato", "contratos.estado",
            "contratos.fecha", "contratos.calificacion")
            ->join('proveedors', 'proveedors.id', '=', 'contratos.id_proveedor')
            ->join('categorias', 'categorias.id', '=', 'contratos.id_categoria')
            ->where('contratos.id_usuario', $id)
            ->get();

        echo json_encode($listado);
    }

    public function calificar($id, $valor)
    {
        $contrato = Contrato::find($id);
        $contrato->calificacion = $valor;
        $contrato->save();
        echo json_encode($contrato);

    }

}
