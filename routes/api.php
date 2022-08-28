<?php

use Illuminate\Support\Facades\Route;

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

//1-Coding

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::post('/upload', 'FilesController@file');
});


//2-Database

//SELECT GROUP_CONCAT(first_name ,' ', last_name) AS full_name,city,SUM(salary) AS total_salary FROM users GROUP BY city;