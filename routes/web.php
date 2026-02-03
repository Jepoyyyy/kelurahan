<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Dashboard');
});
Route::get('/form', function () {
    return view('form.pemohon');
});
Route::get('/generate-pdf', [App\Http\Controllers\LetterController::class, 'generatePdf']);

