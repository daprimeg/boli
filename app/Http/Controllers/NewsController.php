<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::orderBy('id', 'desc')->get();
        $selectedId = $request->get('id'); 
        return view('user.news', compact('news', 'selectedId'));
    }


    public function togglePin($id)
    {
        $user = Auth::user();
        $news = News::findOrFail($id);

        if ($user->pinnedNews->contains($id)) {
            $user->pinnedNews()->detach($id);
        } else {
            $user->pinnedNews()->attach($id);
        }

        return back();
    }
}
