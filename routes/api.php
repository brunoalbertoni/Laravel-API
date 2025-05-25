<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Funcionarios;
use App\Models\Departamentos;

//php -S localhost:8000 -t public

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/teste', function() {
 return "hello world";
});

//1.1
Route::post('/funcionarios', function(Request $request){
    $funcionario= new Funcionarios();
    $funcionario->nome=$request->input('nome');;
    $funcionario->email=$request->input('email');;
    $funcionario->numero=$request->input('numero');;
    $departamentos_id=$request->input('departamentos_id');
    $departamentos=Departamentos::find($departamentos_id);
    $funcionario->departamentos()->associate($departamentos);
    $funcionario->save();
    return response()->json($funcionario);
});

//2.1
Route::post('/departamentos', function(Request $request){
    $departamentos= new Departamentos();
    $departamentos->nome=$request->input('nome');;
    $departamentos->descricao=$request->input('descricao');;
    $departamentos->save();
    return response()->json($funcionario);
});

//1.2
Route::get('/funcionarios' , function () {
 $funcionarios = Funcionarios::all();
 return response()->json($funcionarios);
});

//2.2
Route::get('/departamentos' , function () {
 $departamentos = Departamentos::all();
 return response()->json($departamentos);
});

//1.3
Route::get('/funcionarios/{id}' , function ($id) {
 $funcionario = Funcionarios::find($id);
 return response()->json($funcionario);
});

//2.3
Route::get('/departamentos/{id}' , function ($id) {
 $departamento = Departamentos::find($id);
 return response()->json($departamento);
});

//1.4
Route::patch('/funcionarios/{id}', function (Request $request, $id) {
 $funcionario = Funcionarios::find($id);
 if($request->input('nome') !== null){
 $funcionario->nome = $request->input('nome');
 }
 if($request->input('email') !== null){
 $funcionario->email = $request->input('email');
 }
 if($request->input('numero') !== null){
 $funcionario->numero = $request->input('numero');
 }
 $funcionario->save();
 return response()->json($funcionario);
});

//2.4
Route::patch('/departamentos/{id}', function (Request $request, $id) {
 $departamento = Departamentos::find($id);
 if($request->input('nome') !== null){
 $departamento->nome = $request->input('nome');
 }
 if($request->input('descricao') !== null){
 $departamento->descricao = $request->input('descricao');
 }
 $departamento->save();
 return response()->json($departamento);
});

//1.5
Route::delete('/funcionarios/{id}' , function ($id) {
 $funcionarios = Funcionarios::find($id);
 $funcionarios->delete();
 return response()->json($funcionarios);
});

//2.5
Route::delete('/departamentos/{id}' , function ($id) {
 $departamentos = Departamentos::find($id);
 $departamentos->delete();
 return response()->json($departamentos);
});

//3
Route::get('/funcionarios/departamentos' , function ($id) {
 $funcionarioss = Funcionarios::with('departamentos')->get();
 return response()->json($funcionarios);
});

//4
Route::get('/departamentos/funcionarios' , function ($id) {
 $departamentos = Departamentos::with('funcionarios')->get();
 return response()->json($departamentos);
});

//5
Route::get('/funcionarios/departamentos/{id}', function ($id) {
 $funcionarios = Funcionarios::find($id);
 $departamentos = $funcionarios->departamentos;
 return response()->json($departamentos);
});

//6
Route::get('/departamentos/funcionarios/{id}', function ($id) {
 $departamentos = departamentos::find($id);
 $funcionarios = $departamentos->funcionarios;
 return response()->json($funcionarios);
});



