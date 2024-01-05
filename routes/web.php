<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\AuthController;
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


Route::get('/list_produit', [ProduitController::class,'listing'])->name('listing')->middleware('auth');
Route::get('/ajout_produit', [ProduitController::class,'ajout_prod'])->middleware('auth');

Route::post('/create_p',[ProduitController::class,'create_p'])->middleware('auth');
Route::get('edite_p/{id}',[ProduitController::class,'edite'])->middleware('auth');
Route::put('/update',[ProduitController::class,'update'])->middleware('auth');
Route::get('supprimer_p/{id}',[ProduitController::class,'supprimer_p'])->middleware('auth');
Route::get('/approvissionnement',[ProduitController::class,'appro'])->middleware('auth');
Route::get('/modif_produit', function () {return view('produit.modif_produit'); })->middleware('auth');
Route::put('/mise_a_jour',[ProduitController::class,'mise_a_jour'])->middleware('auth');
Route::get('/ajout_categorie', function () {  return view('categorie.ajout_categorie');})->middleware('auth');
Route::get('/list_categorie',[CategorieController::class,'listing_c'])->name('listing_c')->middleware('auth');
Route::post('/ajout_c',[CategorieController::class,'ajout_c'])->middleware('auth');
Route::post('/recherche', [ProduitController::class,'recherche'])->middleware('auth');


Route::get('/modif_categorie',function(){ return view ('categorie.modif_categorie');})->middleware('auth');
Route::get('/edite_c/{id}',[CategorieController::class,'edite'])->middleware('auth');
Route::put('/update_c',[CategorieController::class,'update'])->middleware('auth');
Route::get('supprimer_c/{id}',[CategorieController::class,'supprimer'])->middleware('auth');

Route::get('/list_vente', [VenteController::class,'listing_v'])->name('listing_v')->middleware('auth');
Route::post('/ajout_v',[VenteController::class,'ajout_v'])->middleware('auth');
Route::get('/ajout_vente', [VenteController::class,'ajout_ven'])->name('ajout_vente')->middleware('auth');
Route::get('/supprimer_v/{id}',[VenteController::class,'supprimer_v'])->middleware('auth');
Route::put('/update_v',[VenteController::class,'update_v'])->middleware('auth');
Route::get('/edite_v/{id}',[VenteController::class ,'edite'])->middleware('auth');

Route::get('/ligne_de_vente', [VenteController::class ,'listing_ligne'])->middleware('auth');

Route::get('/', [VenteController::class ,'donne_du_jour'])->name('home')->middleware('auth');
Route::get('/login', [AuthController::class ,'login'])->name('auth.login');
Route::post('/dologin', [AuthController::class ,'dologin']);
Route::delete('/logout', [AuthController::class ,'logout'])->name('auth.logout');
Route::post('/inscription',[AuthController::class ,'inscription']);
Route::get('/ajout_user',function(){ return view ('auth.ajout_user');});
Route::get('/accueil',function(){ return view ('user.accueil');});





