<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;

class SongBaseController extends Controller
{
    public function index()
    {
        $songs = Song::where('is_approved', true)->get();
        $songCount = count($songs);
        return view('front.songs.index', compact('songs', 'songCount'));
    }

    public function show($slug)
    {        
        $song = Song::where('slug', $slug)->first();
        if (! $song) {
            return back()->with('error', 'Песня не найдена!');
        }
        return view('front.songs.show', compact('song'));
    }
}
