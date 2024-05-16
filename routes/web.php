<?php

use App\Http\Controllers\DashbordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\HistoriqueController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
//login
Route::get('/', function () {
    return view('login');
})->name('login');

//nav 
Route::post('/login',[LoginController::class,'index'])->name('check');
Route::get('/Disconnection',[LoginController::class,'logout'])->name('Disconnection');

//dashboard 
Route::get('/Dashboard',[DashbordController::class,'show'])->name('dashboard');
Route::post('/Evaluez',[DashbordController::class ,'create'])->name('Evaluez');
Route::put('/Evaluez/{note}/update',[DashbordController::class,'update'])->name('UpdateEvaluation');
Route::delete('/Evaluation/{note}/delete',[DashbordController::class,'destroy'])->name('DeleteEvaluation');

//historique 
Route::get ('/Historique',[HistoriqueController::class,'index'])->name('Historique');

//Technicien 
Route::get("/Techniciens",[TechnicienController::class,'index'])->name('Techniciens');
Route::post('/Techniciens/Create',[TechnicienController::class,'create'])->name('AddTech');
Route::put('/Techniciens/{technicien}/update',[TechnicienController::class,'update'])->name('updateTech');