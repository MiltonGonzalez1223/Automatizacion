<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Statu;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $orders = DB::select("SELECT fecha_cargue, COUNT(*) as Cant
        FROM orders
        GROUP BY fecha_cargue order by fecha_cargue desc;");
        return view('orders.index', compact('orders'));
        
    }

    public function create(){

        return view('orders.create');
    }

    public function show($id){

        $orders = DB::select("SELECT orders.*, Hom_Proveedor.Nombre_Proveedor, status.name
        FROM Orders INNER JOIN Hom_Proveedor ON Orders.acreedor=Hom_Proveedor.acreedor
                    INNER JOIN status ON orders.status = status.id;");
        $status = Statu::all();
        return view('orders.show', compact('orders', 'status'));
    }

    public function store(Request $request){     
        $periodo = $request->año.$request->mes;
        $query = DB::statement("EXEC ORDERS_CARGUE $periodo");

        if ($query) {
            return redirect()->route('orders.index');
        }
    }

    public function edit(Request $request)
    {
        $status = statu::all();
        $orders = DB::select("select * from orders where periodo = '$request->periodo' AND value = '$request->value'");
        return view('orders.edit', compact('orders', 'status'));
    }   

    public function update(Request $request, $id){
        $query = DB::statement("UPDATE orders
        SET status = '$request->status' where pedido = '$id'");
        if ($query) {
            return redirect()->route('orders.index');
        }else{
            return "Error al realizar la actualizacion";
        }
    }

    public function destroy($order)
    {
        $query = DB::delete('DELETE FROM orders WHERE acreedor =\''.$order.'\'');

        if ($query) {
            return redirect()->route('orders.index');
        }else{
            return "Error al realizar la eliminar";
        }
    }
}
