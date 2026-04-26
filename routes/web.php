<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormControllerexm;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ContentManController;
use App\Http\Controllers\DashboardController;
use App\Livewire\EventManager;
use App\Livewire\NewsManager;
use App\Livewire\InovationManager;
use App\Http\Controllers\InnovationDetail;
use App\Http\Controllers\searchController;


// routes/web.php
Route::get('/api/search', [searchController::class, 'index']);
// ✅ Route spesifik HARUS di atas route dinamis
Route::post('/form/final-submit', [FormControllerexm::class, 'finalSubmit'])
    ->name('form.final.submit');

Route::get('/form/success', function () {
    return view('wizardform', ['step' => 'success']);
})->name('form.success');


// Route dinamis di bawah
Route::get('/form/{step}', [FormControllerexm::class, 'show'])
    ->name('form.step');
Route::post('/form/{step}', [FormControllerexm::class, 'store'])
    ->name('form.step.post')->where('step', 'pemohon|ayah|ibu|pasangan');;
Route::get('/reset-form', function () {
    session()->forget('form');
    return redirect('/form/pemohon')->with('success', 'Form session cleared');
});
Route::get('/dashboard', [DashboardController::class, 'tabelsurat'])
    ->name('dashboard');
Route::get('/content', [ContentManController::class, 'index'])
    ->name('content');
Route::get('/content/news', NewsManager::class)
    ->name('content.news');
Route::get('/content/events', EventManager::class)
    ->name('content.events');
Route::get('/innovation/{slug}', [InnovationDetail::class,'index'])
    ->name('innovation.detail');
Route::get('/content/inovations', InovationManager::class)
    ->name('content.inovations');
Route::post('/content-man', [ContentManController::class, 'newsstore'])
    ->name('content-man.store');
Route::get('/', [LandingController::class,'index'])->name('landing');
Route::get('/generate-pdf', [App\Http\Controllers\LetterController::class, 'generatePdf']);
