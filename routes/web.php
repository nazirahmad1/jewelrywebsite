<?php

use App\Http\Controllers\ProductController;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/ping', function (Request  $request) {    
      $connection = DB::connection('mongodb');
       $msg = 'MongoDB is accessible!';
     try {  
       $connection->command(['ping' => 1]);  
        } catch (\Exception  $e) {  
       $msg = 'MongoDB is not accessible. Error: ' . $e->getMessage();
     }
       return ['msg' => $msg];
    });
Route::get('/', [ProductController::class,'index']);
Route::get('/about',[ProductController::class,'about']);
Route::get('/shop',[ProductController::class,'shop']);
Route::get('/blog',[ProductController::class,'blog']);
Route::get('/dashboard',[ProductController::class,'showall']);

Route::delete('/dashboard/{id}/delete',[ProductController::class,'destroy']);


Route::get('/dashboard/create',[ProductController::class,'create']);
Route::post('/dashboard/create',[ProductController::class,'store']);

Route::get('/dashboard/{id}/edit',[ProductController::class,'edit']);
Route::put('/dashboard/{id}/update',[ProductController::class,'update']);
Route::get('/productDetail/{id}',[ProductController::class,'productDetail']);
