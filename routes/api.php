<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Use App\Items;

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



Route::get('items', function() {
    return Items::all();
});

Route::get('items/{size}', 'ItemsController@getItems');
