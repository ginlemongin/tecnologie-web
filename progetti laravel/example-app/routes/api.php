<?php
/*

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
*/
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/** fai una richiesta get, 
 * nell'array mettiamo la classe del controller - [\App\Http\Controllers\UserController::class]
 * il secondo elemento dell'array è il nome del metodo in UserController
 * 
 * tutte le rotte in api hanno un prefisso /api quindi per richiamarlo dovrai scrivere /api/test (non devi scriverlo qui)
 * /test è la uri
 * 
 * se il metodo test è vuoto avò una risposta vuota se faccio la chiamata su postman
 * 
 * quando qualcuno fa una richeista lui cerca il metodo nell' user controller
 * */
/*
Route::get('/test',
    [\App\Http\Controllers\UserController::class,
    'test'
]);
*/

/**aggiorno il file routes */
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//http://localhost:8000/api

//POST http://localhost:8000/api/users
Route::post('/users', [UserController::class, 'create']);
//DELETE http://localhost:8000/api/users/7 
Route::delete('/users/{id}', [UserController::class, 'delete']);
//GET http://localhost:8000/api/users/3
Route::get('/users/{id}', [UserController::class, 'read']);
//GET http://localhost:8000/api/users
Route::get('/users', [UserController::class, 'readAll']);
//PUT http://localhost:8000/api/users/22
Route::put('/users/{id}', [UserController::class, 'update']);

/**le rotte mappano un determinato capitolo ad una determinata pagina,  
 * 
 * la richiesta-> Route::post('/users', Da qui vedi la pagina a cui andare-> [UserController::class, 'create']);
    /users -> è una uri (parziale)

    all'interno della mia url sei in grado di leggere un pezzetto di rotta, root params è come un 
    parametro GET che puoi leggere

    //PUT http://localhost:8000/api/users/22 -> il numero finale corrisponde ad un id -> formnato
    da rispettare '/users/{id}'

    wordpress funziona con il front controller pattern che risponde sempre con l'index php
 */