<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vocal;
use App\Models\Song;
use App\Models\OriginalSong;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $vocalCount = Vocal::all()->count();
        $songCount = Song::all()->count();
        $originalSongCount = OriginalSong::all()->count();
        $userCount = User::all()->count();
        return view('admin.index', compact('vocalCount', 'songCount', 'originalSongCount', 'userCount'));
    }
}
