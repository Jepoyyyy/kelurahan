<?php

namespace App\Http\Controllers;
use App\Models\news;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LandingController extends Controller
{
    public function index(){
        Carbon::setLocale('id');
        $newsList = News::all()->map(function($news) {
    $news->formatted_date = $news->created_at?->translatedFormat('d F Y');
    return $news;
    });
        return view('landing',compact
        ('newsList',

        ));
    }
}
