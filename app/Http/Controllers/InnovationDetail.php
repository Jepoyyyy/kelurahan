<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Innovation;
use App\Models\InnovationUpdate;
use App\Models\InnovationUpdateMedia;



class InnovationDetail extends Controller
{
    public function index(string $slug)
    {
    $innovation = Innovation::where('slug', $slug)->firstOrFail();

        $updates = $innovation->updates()->with('media')->latest()->paginate(5);

        $totalMedia = $innovation->updates()
                        ->with('media')
                        ->get()
                        ->sum(fn($u) => $u->media->count());

        $recentUpdates = $innovation->updates()
                            ->where('created_at', '>=', now()->subDays(30))
                            ->count();

        return view('innovationdetail', compact(
            'innovation',
            'updates',
            'totalMedia',
            'recentUpdates'
        ));

    }
}
