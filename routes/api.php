<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/", [TodoController::class, "getAll"]);
Route::get("/{id}", [TodoController::class,"show"])->where("id", "[1-9][0-9]*");
Route::put("/{id}", [TodoController::class,"update"])->where("id", "[1-9][0-9]*");
Route::delete("/{id}", [TodoController::class,"destroy"])->where("id", "[1-9][0-9]*");
Route::post("/new-todo", [TodoController::class,"store"]);
Route::patch("/completed/{id}", [TodoController::class,"completedTodo"])->where("id", "[1-9][0-9]*");
