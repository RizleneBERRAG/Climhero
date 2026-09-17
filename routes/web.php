<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Site public
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/nos-prestations/{slug}', [ServiceController::class, 'show'])
    ->name('service');

Route::get('/pompe-a-chaleur-climatisation/{slug}', [CityController::class, 'show'])
    ->name('city');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:8,1')
    ->name('contact.store');

Route::get('/mentions-legales', [LegalController::class, 'mentions'])->name('legal.mentions');
Route::get('/politique-de-confidentialite', [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/plan-du-site', [SitemapController::class, 'page'])->name('sitemap');
Route::get('/sitemap.xml', [SitemapController::class, 'xml'])->name('sitemap.xml');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

/*
|--------------------------------------------------------------------------
| Back-office : boite de reception des demandes de devis
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/connexion', [AuthController::class, 'show'])
        ->middleware('guest')
        ->name('login');

    Route::post('/connexion', [AuthController::class, 'login'])
        ->middleware(['guest', 'throttle:6,1'])
        ->name('login.attempt');

    Route::post('/deconnexion', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [LeadController::class, 'index'])->name('leads');
        Route::get('/demandes/export', [LeadController::class, 'export'])->name('leads.export');
        Route::get('/demandes/{lead}', [LeadController::class, 'show'])->name('leads.show');
        Route::patch('/demandes/{lead}', [LeadController::class, 'update'])->name('leads.update');
    });
});
