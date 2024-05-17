<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SidebarController;

//Client
Route::get('/client', [ClientController::class, 'liste_client'])->middleware('auth');
Route::post('/ajoutcli/traitement', [ClientController::class, 'ajoutcli_client_traitement']);
Route::delete('/suppcli/{id_cli}', [ClientController::class, 'suppcli_client_suppression']);
Route::get('/Affichecli/{id_cli}', [ClientController::class, 'afficherClient']);
Route::post('/modifcli/modification', [ClientController::class, 'modifcli_Client_modification']);

//Commande
Route::get('/commande', [CommandeController::class, 'liste_commande'])->middleware('auth');
Route::post('/ajoutcmd/traitement', [CommandeController::class, 'ajoutcmd_commande_traitement']);
Route::delete('/suppcmd/{id_cmd}', [CommandeController::class, 'suppcmd_commande_suppression']);
Route::get('/generate-pdf', [CommandeController::class, 'generatePDF']);

//Facture
Route::get('/facture', [FactureController::class, 'affiche_facture'])->middleware('auth');
Route::get('/factureList', [FactureController::class, 'liste_facture'])->middleware('auth');
Route::post('/ajoutfact/traitement', [FactureController::class, 'ajoutfact_facture_traitement']);

//Recherche
Route::get('/facture/{id_cli}', [FactureController::class, 'affichage']);

//Auth
Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/', [AuthController::class, 'doLogin']);

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'total_table'])->name('dashboard')->middleware('auth');

//Email
Route::post('/email', [FactureController::class, 'email']);

//exportation
Route::get('/export/database', [SidebarController::class, 'exportDatabase']);
