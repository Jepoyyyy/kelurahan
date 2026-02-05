<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormControllerexm;
use Livewire\Form;

Route::get('/', function () {
    return view('Dashboard');
});
// Route::controller(FormController::class)->group(function () {

//     Route::get('/form/pemohon', 'pemohonstep')->name('form.pemohon');
//     Route::post('/form/pemohon', 'postpemohonstep')->name('form.pemohon.post');

//     Route::get('/form/ayah', 'ayahstep')->name('form.ayah');
//     Route::post('/form/ayah', 'postayahstep')->name('form.ayah.post');

//     Route::get('/form/ibu', 'ibustep')->name('form.ibu');
//     Route::post('/form/ibu', 'postibustep')->name('form.ibu.post');

//     Route::get('/form/overview', 'overviewstep')->name('form.overview');
//     Route::post('/form/overview', 'postoverviewstep')->name('form.overview.post');
// });
Route::get('/form/{step}', [FormControllerexm::class, 'show'])->name('form.step');;
Route::post('/form/{step}', [FormControllerexm::class, 'store'])->name('form.step.post');;
Route::post('/form/submit', [FormControllerexm::class, 'finalSubmit'])
    ->name('form.final.submit');


Route::get('/generate-pdf', [App\Http\Controllers\LetterController::class, 'generatePdf']);

Route::get('/reset-form', function () {
    session()->forget('form');
    return 'Form session cleared';
});


