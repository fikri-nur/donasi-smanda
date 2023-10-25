<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\UserController;
use App\Models\Rekening;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/all-campaign', [HomeController::class, 'allCampaign'])->name('all-campaign');

Route::get('/campaign/search', [HomeController::class, 'search'])->name('campaign.search');

Route::get('/campaign/{campaign:slug}', [HomeController::class, 'show'])->name('campaign.show');

Route::get('campaign/{campaign:slug}/form', [HomeController::class, 'form'])->name('campaign.form');

Route::post('campaign/{campaign:slug}/form/submit', [HomeController::class, 'donate'])->name('campaign.donate');

Route::get('/about', function () {
    return view('home.about.index');
})->name('about');

Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('user', UserController::class)->names([
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'show' => 'admin.user.show',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy',
    ]);

    Route::resource('campaign', CampaignController::class)->names([
        'index' => 'admin.campaign.index',
        'create' => 'admin.campaign.create',
        'store' => 'admin.campaign.store',
        'show' => 'admin.campaign.show',
        'edit' => 'admin.campaign.edit',
        'update' => 'admin.campaign.update',
        'destroy' => 'admin.campaign.destroy',
    ]);

    Route::get('admin/campaign/{campaign}/delete', [CampaignController::class, 'delete'])->name('admin.campaign.delete');
    
    Route::resource('donatur', DonaturController::class)->names([
        'index' => 'admin.donatur.index',
        'create' => 'admin.donatur.create',
        'store' => 'admin.donatur.store',
        'show' => 'admin.donatur.show',
        'edit' => 'admin.donatur.edit',
        'update' => 'admin.donatur.update',
        'destroy' => 'admin.donatur.destroy',
    ]);

    Route::resource('rekening', RekeningController::class)->names([
        'index' => 'admin.rekening.index',
        'create' => 'admin.rekening.create',
        'store' => 'admin.rekening.store',
        'show' => 'admin.rekening.show',
        'edit' => 'admin.rekening.edit',
        'update' => 'admin.rekening.update',
        'destroy' => 'admin.rekening.destroy',
    ]);

    Route::get('admin/rekening/{rekening}/delete', [RekeningController::class, 'delete'])->name('admin.rekening.delete');
});

Auth::routes();


