<?php

use App\Http\Controllers\categorieControllers;
use App\Http\Controllers\clientControllers;
use App\Http\Controllers\commandeController;
use App\Http\Controllers\couleurControllers;
use App\Http\Controllers\couponController;
use App\Http\Controllers\marqueController;
use App\Http\Controllers\notificationControllers;
use App\Http\Controllers\produitController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

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
Route::get('/admin',[userController::class,'admin'])->name('admin');

/*-------------Clients--------------------*/
Route::get('/',[clientControllers::class,'home'])->name('home');
Route::get('/boutique',[clientControllers::class,'boutique'])->name('boutique');
Route::get('/commande',[clientControllers::class,'commande'])->name('commande');
Route::post('/boutique',[clientControllers::class,'filtre'])->name('filtre');
Route::post('/recherche',[clientControllers::class,'rechercher'])->name('rechercher');
Route::get('/detail/{id}',[clientControllers::class,'detail'])->name('detail');
Route::get('/panier',[clientControllers::class,'panier'])->name('panier');
Route::post('/panier',[clientControllers::class,'ajoutPanier'])->name('ajout.panier');
Route::get('/panier/supprimer/{id}',[clientControllers::class,'supprimerPanier'])->name('supprimer.panier');
Route::post('/inscription',[clientControllers::class,'inscription'])->name('inscription.client');
Route::post('/commande',[clientControllers::class,'commander'])->name('commander.client');
Route::post('/coupon',[clientControllers::class,'utiliser'])->name('utiliser.coupon');

/*------------- Notifications ---------------*/
Route::get('/admin/listes/notification',[notificationControllers::class,'listes'])->name('liste.notification');
Route::get('/admin/voir/notification/{id}',[notificationControllers::class,'voir'])->name('voir.notification');
Route::get('/admin/supprimer/notification/{id}',[notificationControllers::class,'supprimer'])->name('supprimer.notification');

/*------------Catégories-------------*/
Route::get('/admin/ajout/catégories',[categorieControllers::class,'ajout'])->name('ajout.categorie');
Route::post('/admin/enregistrer/catégories',[categorieControllers::class,'enregistrer'])->name('creer.categorie');
Route::get('/admin/listes/catégories',[categorieControllers::class,'listes'])->name('liste.categorie');
Route::get('/admin/categories/modifier/{id}',[categorieControllers::class,'modifier'])->name('modifier.categorie');
Route::post('/admin/categories/modifier',[categorieControllers::class,'update'])->name('update.categorie');
Route::get('/admin/categories/supprimer/{id}',[categorieControllers::class,'supprimer'])->name('supprimer.categorie');

/*------------- Marques ---------------------*/
Route::get('/admin/ajout/marques',[marqueController::class,'ajout'])->name('ajout.marque');
Route::post('/admin/enregistrer/marques',[marqueController::class,'enregistrer'])->name('creer.marque');
Route::get('/admin/listes/marques',[marqueController::class,'listes'])->name('liste.marque');
Route::get('/admin/marque/modifier/{id}',[marqueController::class,'modifier'])->name('modifier.marque');
Route::post('/admin/marque/modifier',[marqueController::class,'update'])->name('update.marque');
Route::get('/admin/marques/supprimer/{id}',[marqueController::class,'supprimer'])->name('supprimer.marque');

/*-------------Couleurs----------------*/
Route::get('/admin/ajout/couleur',[couleurControllers::class,'ajout'])->name('ajout.couleur');
Route::post('/admin/couleur/enregister',[couleurControllers::class,'enregistrer'])->name('couleur.creer');
Route::get('/admin/listes/couleur',[couleurControllers::class,'listes'])->name('liste.couleur');
Route::get('/admin/couleur/modifier/{id}',[couleurControllers::class,'modifier'])->name('modifier.couleur');
Route::post('/admin/couleur/modifier',[couleurControllers::class,'update'])->name('update.couleur');
Route::get('/admin/couleur/supprimer/{id}',[couleurControllers::class,'supprimer'])->name('supprimer.couleur');

/*----------------- Produit ---------------------*/
Route::get('/admin/ajout/produit',[produitController::class,'ajout'])->name('ajout.produit');
Route::post('/admin/enregistrer/produit',[produitController::class,'enregistrer'])->name('creer.produit');
Route::get('/admin/listes/produit',[produitController::class,'listes'])->name('liste.produit');
Route::get('/admin/produit/modifier/{id}',[produitController::class,'modifier'])->name('modifier.produit');
Route::post('/admin/produit/modifier',[produitController::class,'update'])->name('update.produit');
Route::get('/admin/produit/suppreImage/{id}',[produitController::class,'suppreImage'])->name('supprimerImage.produit');
Route::get('/admin/produit/supprimer/{id}',[produitController::class,'supprimer'])->name('supprimer.produit');

/*---------- Commande -------------*/
Route::get('/admin/ajout/commande',[commandeController::class,'ajout'])->name('ajout.commande');
Route::post('/admin/enregistrer/commande',[commandeController::class,'enregistrer'])->name('creer.commande');
Route::get('/admin/listes/commande',[commandeController::class,'listes'])->name('liste.commande');
Route::get('/admin/commande/modifier/{id}',[commandeController::class,'modifier'])->name('modifier.commande');
Route::post('/admin/commande/modifier',[commandeController::class,'update'])->name('update.commande');
Route::get('/admin/commande/mail',[commandeController::class,'envoiEMail'])->name('mail.client');
Route::get('/admin/commande/supprimer/{id}',[commandeController::class,'supprimer'])->name('supprimer.commande');

/*-------------Coupon--------*/
Route::get('/admin/ajout/coupon',[couponController::class,'ajout'])->name('ajout.coupon');
Route::get('/admin/liste/coupon',[couponController::class,'listes'])->name('liste.coupon');
Route::post('/admin/enregistrer/coupon',[couponController::class,'enregistrer'])->name('creer.coupon');
Route::get('/admin/coupon/supprimer/{id}',[couponController::class,'supprimer'])->name('supprimer.coupon');


/*-------Utilisteur-----------*/
Route::get('/admin/inscription',[userController::class, 'add_user'])->name('inscription.utilisateur');
Route::get('/admin/profile/{id}',[userController::class, 'profil'])->name('profil.utilisateur');
Route::post('/admin/inscription',[userController::class, 'inscription'])->name('inscription.admin');
Route::post('/admin/save',[userController::class, 'save'])->name('save');
Route::get('/admin/liste/utlisateurs',[userController::class,'liste'])->name('liste.utilisateur');
Route::get('/admin/ajout/utlisateurs',[userController::class,'ajout'])->name('ajout.utilisateur');
Route::post('/admin/ajout/utlisateurs',[userController::class, 'ajouter'])->name('ajouter.utilisateur');


Route::get('/admin/liste', function () {
    return app('App\Http\Controllers\userController')->liste();
})->middleware(['auth'])->name('dashboard');
Route::get('/admin/client/edit/{id}',[userController::class, 'voir'])->name('voir.user');
Route::get('/admin/employe/supprimer/{id}',[userController::class, 'suppr_user'])->name('suppr.user');
Route::post('/admin/update',[userController::class, 'update'])->name('update.user');
require __DIR__.'/auth.php';
