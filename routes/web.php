<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RefundController;
use App\Usuario;
use App\Refund;

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
    return view('welcome');
});

/** Fetch all users and all refunds */
Route::get('/list', function() {
    /** Fetch all users */
    $controller = new \App\Http\Controllers\UsuarioController;
    $usuarios = $controller->list();
    /** Fetch all refunds */
    /** Fetch all refunds for each user */
    $controller = new \App\Http\Controllers\RefundController;
    $refunds = [];
    foreach($usuarios as $usuario)
    {
        array_push($refunds, $controller->list($usuario));
    }
    return response()->json([$usuarios, $refunds]);
    // return view('refunds.list');
});

// /** Show only specific refund */
// Route::get('/show/{id}', function($id) {
//     /** Fetch specific refund */
//     $controller = new \App\Http\Controllers\RefundController;
//     $refund = $controller->show($id);
//     return response()->json([$refund]);
// });

/** All refund tasks are handled by 'RefundController' and 'UsuarioController' */
Route::post('/create', function(Request $request){
    /** Insert user in 'Usuario' table */
    $controller = new \App\Http\Controllers\UsuarioController;
    $controller->store($request);
    /** Insert refund in 'Refund' table */
    $controller = new \App\Http\Controllers\RefundController;
    $controller->store($request);
    /** Redirect to listing refunds */
    return redirect('/list');
});

/** Delete specific refund */
Route::delete('/delete', function(Request $request){
    /** Delete refund if type == 0; user otherwise */
    if($request->type == 0)
    {
        Refund::findOrFail($request->id)->delete();
    }
    else
    {
        Usuario::findOrFail($request->id)->delete();
    }
    return redirect('/list');
});

/** Update specific refund */
Route::get('/edit', function(Request $request){
    /** Only change refund value */
    $controller = new \App\Http\Controllers\RefundController;
    $controller->edit($request);
    return redirect('/list');
});