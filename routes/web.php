<?php

use App\Http\Controllers\ClientController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get("/login", [\App\Http\Controllers\AuthController::class, "login"])->name("auth.login");
Route::delete("/logout", [\App\Http\Controllers\AuthController::class, "logout"])->name("auth.logout");
Route::post("/login", [\App\Http\Controllers\AuthController::class, "connexion"]);
Route::get("/client", [ClientController::class, "index"])->name("client")->middleware('auth');
Route::get("/client/create", [ClientController::class, "create"])->name("client.create")->middleware('auth');
Route::post("/client/create", [ClientController::class, "store"])->name("client.ajouter")->middleware('auth');
Route::delete("/client/{client}", [ClientController::class, "delete"])->name("client.supprimer")->middleware('auth');
Route::put("/client/{client}", [ClientController::class, "update"])->name("client.update")->middleware('auth');
Route::get("/client/{client}", [ClientController::class, "modifier"])->name("client.modifier")->middleware('auth');
Route::get("/download-pdf", [ClientController::class, "downloadPDF"])->name("generatePDF")->middleware('auth');
Route::get("/search", [ClientController::class, "search"])->middleware('auth');
