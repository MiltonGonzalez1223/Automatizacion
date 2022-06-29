<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ObservationsController;
use App\Http\Controllers\OrdersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $cant = DB::select("select count(*) as cant from orders where status = '3'");
    $pendientes = DB::select("select orders.acreedor, Nombre_proveedor,periodo,Moneda_Pago, value
    from orders
    INNER JOIN Hom_Proveedor ON orders.acreedor=Hom_Proveedor.acreedor
    where status = '3'");
    return view('welcome', compact('pendientes', 'cant'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();


//===========RUTAS PARA LA SECCION DE Documentos===========
Route::resource('doc', DocsController::class)->names('docs')->parameters(['doc' => 'periodo']);

//===========RUTAS PARA LA SECCION DE proveedores===========
Route::resource('supplier', SuppliersController::class)->names('suppliers')->parameters(['supplier' => 'acreedor']);

//===========RUTAS PARA LA SECCION DE pedidos y migos===========
Route::resource('order', OrdersController::class)->names('orders')->parameters(['order' => 'Referencia']);

//===========RUTAS PARA LA SECCION DE seguimiento===========
Route::resource('follow', FollowsController::class)->names('follows')->parameters(['follow' => 'Acreedor']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
