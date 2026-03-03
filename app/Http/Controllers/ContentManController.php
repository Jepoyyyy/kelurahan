<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentManController extends Controller
{
    public function index()
    {
        return view('components');
    }

    public function newsstore(Request $request)
    {
        $news = $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'required',
            'description' => 'required',
        ]);

        DB::table('newss')->insert([
            'title' => $news['title'],
            'picture' => $news['picture'],
            'description' => $news['description'],
        ]);
        return redirect()->back()->with('success', 'Content created successfully.');
    }
}
