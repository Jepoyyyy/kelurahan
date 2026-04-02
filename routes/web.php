<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormControllerexm;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ContentManController;
use App\Http\Controllers\DashboardController;

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
Route::get('/content-man', [ContentManController::class, 'index'])
    ->name('content-man');
Route::post('/content-man', [ContentManController::class, 'newsstore'])
    ->name('content-man.store');
Route::get('/', [LandingController::class,'index'])->name('landing');
Route::get('/generate-pdf', [App\Http\Controllers\LetterController::class, 'generatePdf']);
