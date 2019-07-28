<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $proveedores = Proveedor::select('proveedors.nombres AS pnombre', 'proveedors.apellidos AS papellido',
        'proveedors.descripcion', 'categorias.nombre', 'proveedors.celular')
                        ->join('categorias','categorias.id','=','proveedors.id_categoria')
                        ->where('proveedors.id_categoria',$id)
                        ->get();
        echo (json_encode($proveedores));
    }

    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
