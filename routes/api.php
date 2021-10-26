<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kelascontroller;
use App\Http\Controllers\Siswacontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    //Route::middleware('auth:sanctum')->get('/user', function (Request $request) {  
     //return $request->user();
    Route::post("/insert_kelas",[Kelascontroller::class,'store']);
    Route::post("/insert_siswa",[Siswacontroller::class,'store']);
    Route::get("/get_siswa",[Siswacontroller::class,'getsiswakelas']);
    Route::put("/update_siswa/{id}",[Siswacontroller::class,'update']);
    Route::delete("/delete_siswa/{id}",[Siswacontroller::class,'destroy']);
?>