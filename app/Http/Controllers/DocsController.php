<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Docs;
use App\Models\Suppliers;
use Illuminate\Support\Facades\DB;

class DocsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = DB::select("SELECT periodo, COUNT(*) as Cant
        FROM docs
        GROUP BY periodo order by periodo desc;");
        return view('docs.index', compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = DB::select("SELECT *FROM Hom_Proveedor ORDER BY Nombre_Proveedor asc");
        return view('docs.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->mes) {
            case "01":
                $pago = "ene-".substr($request->año, 2);
                break;
            case "02":
                $pago = "feb-".substr($request->año, 2);
                break;
            case "03":
                $pago = "mar-".substr($request->año, 2);
                break;
            case "04":
                $pago = "abr-".substr($request->año, 2);
                break;
            case "05":
                $pago = "may-".substr($request->año, 2);
                break;
            case "06":
                $pago = "jun-".substr($request->año, 2);
                break;
            case "07":
               $pago = "jul-".substr($request->año, 2);
               break;
            case "08":
                $pago = "ago-".substr($request->año, 2);
                break;
            case "09":
               $pago = "sep-".substr($request->año, 2);
               break;
            case "10":
                $pago = "oct-".substr($request->año, 2);
                break;
            case "11":
                $pago = "nov-".substr($request->año, 2);
                break;
            case "12":
                $pago = "dic-".substr($request->año, 2);
                break;
        }
        $periodo = $request->año.$request->mes;
        $_FILES['file']['name'] = $request->document."_".$periodo.".pdf";
        $nombre = $_FILES['file']['name'];

        $valor3 = substr($request->value, 0, 5);
        $valor4 = substr($request->value, 5);
        $pos = strpos($valor3, ',');
        if ($pos == true) {
            $value2 = str_replace(',', '.', $valor3);
        }else{$value2 = $valor3;}
        $valor = $value2.$valor4;
        $valor3 = substr($valor, -4);
        $valor2 = substr($valor, 0, -4);
        $pos = strpos($valor, '.');
        if ($pos == true) {
            $value = str_replace('.', ',', $valor3);
        }else{$value = $valor;}
        $valor = $valor2.$value;
        $value = str_replace('.', ',', $request->value);
        $servidor = 'C:\xampp\htdocs\PruebaCath\public\storage\\'.$periodo.'\\'.$request->acreedor.'\\'.$nombre;
        $tipo = strtolower(pathinfo($servidor, PATHINFO_EXTENSION));
        if ($tipo == 'pdf') {
            if (move_uploaded_file($request->file('file'), $servidor)) {
                $servidor = substr($servidor, 34);
                $servidor = "..\\".$servidor;
                $docs = new Docs();

        $docs->acreedor = $request->acreedor;
        $docs->document = $request->document;
        $docs->value = $valor;
        $docs->periodo = $periodo;
        $docs->url = $servidor;
        $docs->pago = $pago;

        $docs->save();
        return redirect()->route('docs.index');
            }
        }else{
            echo "Error.";
            die();
        }  
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docs = DB::select("SELECT docs.*, Hom_Proveedor.Nombre_Proveedor FROM docs INNER JOIN Hom_Proveedor ON docs.acreedor=Hom_Proveedor.acreedor where periodo = '$id'");

        return view('docs.show', compact('docs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docs = docs::where('Acreedor', $id)->first();
        return view('docs.edit', compact('docs'));
    }
}
