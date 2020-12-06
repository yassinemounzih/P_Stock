<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;

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





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/',function(){

    return view('website.index');

});

Route::get('/GetDemandes/{user_id}', [DemandeController::class, 'getDemandesUser'])->name('getDemandesUser');
Route::get('/GetStocks/{demande_id}', [StockController::class, 'getStocksDemandes'])->name('getStocksDemandes');
Route::get('/GetUsers', [DemandeController::class, 'getUser'])->name('getUser');
Route::get('/verification', [DemandeController::class, 'verification'])->name('verification');
Route::get('/verificationV', [DemandeController::class, 'verificationV'])->name('verificationV');
Route::get('/GetDemande', [DemandeController::class, 'getDemande'])->name('getDemande');
Route::get('/AllUses', [UserController::class, 'AllUsers'])->name('AllUsers');
Route::get('/addStock', [DemandeController::class, 'addStock'])->name('addStock');
Route::get('/addAdmin', [UserController::class, 'addAdmin'])->name('addAdmin');

Route::get('/stockDay', [StockController::class, 'stockDay'])->name('stockDay');

Route::get('/last_StockUser', [UserController::class, 'last_StockUser'])->name('last_StockUser');
Route::get('/getLastStock/{user_id}', [StockController::class, 'getLastStock'])->name('getLastStock');


Route::get('/edit_retour/{id}', [StockController::class, 'edit_retour'])->name('edit_retour');
Route::get('/stock_update/{id}', [StockController::class, 'stock_update'])->name('stock_update');



// Route::get('/active/{user_id}' , [UserController::class, 'active'])->name('active');
// Route::get('/desactive/{user_id}', [UserController::class, 'desactive'])->name('desactive');

Auth::routes();


Route::group(['prefix'=>'vendeur','Middleware'=>['auth']],function(){

    Route::resource('demandeV' , DemandeController::class);
    Route::resource('stockV' , StockController::class);
    // Route::resource('abonnement' , AbonnementController::class);

    });
Route::group(['prefix'=>'admin','Middleware'=>['auth']],function(){

    Route::resource('demande' , DemandeController::class);
    Route::resource('stock' , StockController::class);
    Route::resource('user' , UserController::class);
        // Route::resource('abonnement' , AbonnementController::class);
    
    });