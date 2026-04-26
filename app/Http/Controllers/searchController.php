<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->get('q', ''));

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = collect();

        // ── LAYANAN (dari config) ──────────────────────────────
        $layanan = collect(config('layanan.list'))
            ->filter(function ($item) use ($query) {
                return str_contains(strtolower($item['judul']),      strtolower($query))
                    || str_contains(strtolower($item['deskripsi']),  strtolower($query));
            })
            ->map(fn($item) => [
                'title'    => $item['judul'],
                'subtitle' => $item['deskripsi'],
                'url'      => $item['url'],
                'type'     => 'Layanan',
            ])
            ->values();

        $results = $results->merge($layanan);

        return response()->json($results->values());
    }
}
