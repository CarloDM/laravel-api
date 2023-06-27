<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;


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
// default
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/prova-api', function(){
  $user = [
    'name'  => 'Carlo',
  ];

  return response()->json(compact($user));
});

Route::namespace('Api')
      ->prefix('post')
      ->group(function(){
          Route::get('/', [PostController::class , 'index'])->name('api-guest');
      });
Route::namespace('Api')
      ->prefix('authors')
      ->group(function(){
          Route::get('/', [PostController::class , 'authors'])->name('api-guest-authors');
      });

