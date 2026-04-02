<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class ContentManController extends Controller
{
    public function index()
    {
        return view('components-content.content-man');
    }

    public function newsstore(Request $request)
    {
        $news = $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required',
        ]);
        $picturePath = $request->file('picture')->store('news', 'public');

        News::create([
            'title' => $news['title'],
            'picture' => $picturePath,
            'description' => $news['description'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Content created successfully.');
    }

    public function newsupdate(Request $request, $id)
    {
        $validated = $request->validate([
            'title'=> 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required',
        ]);
        $updateData = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'updated_at' => now(),
        ];
        if ($request->hasFile('picture')) {
        $oldPicture = News::where('id', $id)->value('picture');
        if ($oldPicture) {
            Storage::disk('public')->delete($oldPicture);
        };
        $updateData['picture'] = $request->file('picture')->store('news', 'public');
        }
        News::where('id', $id)->update($updateData);
        return redirect()->back()->with('success', 'Content updated successfully.');
    }
}
