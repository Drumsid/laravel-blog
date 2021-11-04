<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vocal;
use App\Models\Song;
use App\Models\OriginalSong;
use App\Models\User;
use App\Models\Tutorial;

class MainController extends Controller
{
    public function index()
    {
        $vocalCount = Vocal::all()->count();
        $songCount = Song::all()->count();
        $originalSongCount = OriginalSong::all()->count();
        $userCount = User::all()->count();
        $tutorialCount = Tutorial::all()->count();
        return view('admin.index', compact('vocalCount', 'songCount', 'originalSongCount', 'userCount', 'tutorialCount'));
    }
}
