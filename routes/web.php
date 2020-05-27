<?php

use App\Http\Resources\friendListResource;
use App\Project;
use Illuminate\Support\Facades\Route;
use App\User;

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
  //  return User::with(["Messagerecieved"])->get()->first();
    return new friendListResource( User::where("id",2)->get()->first());
    
    return view('welcome');
});
Route::get('{any}', function () {
    return view('welcome');
});
Route::get("projects",function(){
return Project::with("user")->latest()->get();
});