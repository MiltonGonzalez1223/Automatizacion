<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers;
use Illuminate\Support\Facades\DB;

class SuppliersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $suppliers = Suppliers::all();

        return view('suppliers.index', compact('suppliers'));
    }

    public function create(){

        return view('suppliers.create');
    }

    public function show($id){

        $suppliers = suppliers::where('acreedor', $id)->first();

        return view('suppliers.show', compact('suppliers'));
    }

    public function store(Request $request){        
        $supplier = new suppliers();
        
        $supplier->acreedor = $request->num;
        $supplier->name = $request->name;
        $supplier->money = $request->moneda;
        $supplier->agrupador = $request->agrupador;

        $supplier->save();

        return redirect()->route('suppliers.index');
    }

    public function edit($id)
    {
        $suppliers = suppliers::where('Acreedor', $id)->first();
        return view('suppliers.edit', compact('suppliers'));
    }   

    public function update(Request $request, $id){

        $query = DB::update('UPDATE suppliers
        SET acreedor = '.$request->num.', name=\''.$request->name.'\',
        money = \''.$request->moneda.'\', agrupador=\''.$request->agrupador.'\' WHERE acreedor = \''.$id.'\';');

        if ($query) {
            return redirect()->route('suppliers.index');
        }else{
            return "Error al realizar la actualizacion";
        }
    }

    public function destroy($supplier)
    {
        $query = DB::delete('DELETE FROM suppliers WHERE acreedor =\''.$supplier.'\'');

        if ($query) {
            return redirect()->route('suppliers.index');
        }else{
            return "Error al realizar la eliminar";
        }
    }
}
