<?php

use Illuminate\Support\Facades\Route;

Route::get("/", "UserController@index");
Route::get("/{id}", "UserController@show");
