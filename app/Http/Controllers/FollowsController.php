<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Follows;
use Illuminate\Support\Facades\DB;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $follows = DB::select("SELECT periodo, COUNT(*) as Cant
        FROM docs
        GROUP BY periodo order by periodo desc;");
        return view('follows.index', compact('follows'));
    }

    public function create(){

        return view('follows.create');
    }

    public function show($id){

        $follows = DB::select("SELECT docs.*, Hom_Proveedor.Nombre_Proveedor, status.name, orders.pedido, orders.migo, orders.cod_vul, orders.radicacion FROM docs INNER JOIN Hom_Proveedor ON docs.acreedor=Hom_Proveedor.acreedor INNER JOIN orders ON docs.value = orders.value AND docs.pago = orders.periodo AND orders.acreedor = docs.acreedor INNER JOIN status ON orders.status= status.id where docs.periodo = '$id'");

        return view('follows.show', compact('follows'));
    }

    public function edit($id)
    {
        $follows = follows::where('Acreedor', $id)->first();
        return view('follows.edit', compact('follows'));
    }
}
