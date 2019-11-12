<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{

    public function proveedorContrato($id)
    {
        $proveedores = Proveedor::select('proveedors.nombres AS pnombre', 'proveedors.apellidos AS papellido',
            'proveedors.id AS id')
            ->join('categorias', 'categorias.id', '=', 'proveedors.id_categoria')
            ->where('proveedors.id_categoria', '=', $id)
            ->where('proveedors.estado', '=', 'activo')
            ->get();
        echo json_encode($proveedores);
    }

    public function datos($id)
    {
        $proveedor = Proveedor::find($id);
        echo json_encode($proveedor);
    }

    public function lista()
    {
        $proveedores = Proveedor::all();
        return json_encode($proveedores);
    }

    public function show($id)
    {
        $proveedores = Proveedor::select('proveedors.nombres AS pnombre', 'proveedors.apellidos AS papellido',
            'proveedors.descripcion', 'categorias.nombre', 'proveedors.celular', 'proveedors.calificacion', 'proveedors.id')
            ->join('categorias', 'categorias.id', '=', 'proveedors.id_categoria')
            ->where('proveedors.id_categoria', '=', $id)
            ->where('proveedors.estado', '=', 'activo')
            ->get();
        echo (json_encode($proveedores));
    }

    public function guardar(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->nombres = $request->input('nombres');
        $proveedor->apellidos = $request->input('apellidos');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->celular = $request->input('celular');
        $proveedor->descripcion = $request->input('descripcion');
        $proveedor->id_categoria = $request->input('id_categoria');
        $proveedor->save();

        echo json_encode($proveedor);
    }

    public function actualizar(Request $request)
    {
        $proveedor = Proveedor::find($request->id);
        $proveedor->nombres = $request->input('nombres');
        $proveedor->apellidos = $request->input('apellidos');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->celular = $request->input('celular');
        $proveedor->descripcion = $request->input('descripcion');
        $proveedor->save();
        echo json_encode($proveedor);
    }
    public function borrar($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->estado = 'inactivo';
        $proveedor->save();
        echo json_encode($proveedor);
    }
    public function activar($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->estado = 'activo';
        $proveedor->save();
        echo json_encode($proveedor);
    }

    public function proveedorDisponible()
    {
        $proveedor = DB::select('SELECT * FROM
        proveedors
        WHERE id NOT IN (SELECT id_proveedor FROM usuarios
        WHERE id_proveedor > 0)');
        echo json_encode($proveedor);

    }
}
