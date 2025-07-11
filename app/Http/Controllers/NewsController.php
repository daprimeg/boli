<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $pinnedOnly = $request->get('pinned');

        $news = News::with('pinnedUsers');

        if ($pinnedOnly) {
            $news->whereHas('pinnedUsers', fn($q) => $q->where('user_id', $user->id));
        }

        $news = $news->latest()->get();

        return view('user.news', compact('news', 'user'));
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
