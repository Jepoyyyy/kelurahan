<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of all services.
     */

    /**
     * Display the specified service detail.
     */
    public function show($slug)
{
    $layanan = collect(config('layanan.list'))
        ->firstWhere('slug', $slug)
        ?? collect(config('layanan.list'))
            ->first(fn($l) => str($l['url'])->endsWith($slug));

    abort_if(!$layanan, 404);

    return view('layananView', compact('layanan'));
}

    /**
     * Get all layanan data.
     * You can move this to a database or separate config file.
     */
}
