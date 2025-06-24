<?php

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
    return redirect('/register');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/magic-access/{hash}', function ($hash) {
   
    session(['active_magic_link_hash' => $hash]);

    return redirect()->route('magicLinks.index');

})->middleware('auth')->name('magic.access');

Route::middleware(['auth', 'restrict.no.active.magic.link'])->group(function () {
    Route::resource('luckyDraws', App\Http\Controllers\LuckyDrawController::class);
    Route::resource('magicLinks', App\Http\Controllers\MagicLinkController::class);
});
