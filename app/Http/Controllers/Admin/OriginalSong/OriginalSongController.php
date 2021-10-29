<?php

namespace App\Http\Controllers\Admin\OriginalSong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OriginalSong;
use App\Models\Song;
use App\Http\Requests\OriginalSongRequest;
use Illuminate\Support\Facades\Storage;

class OriginalSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $originalSong = OriginalSong::orderBy('created_at', 'DESC')->get();
        return view('admin.originalsong.index', compact('originalSong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::pluck('title', 'id')->all();
        return view('admin.originalsong.create', compact('songs',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OriginalSongRequest $request)
    {
        $data = $request->validated();
        
        $data['song_name'] = OriginalSong::uploadAudio($request);
        $vocal = OriginalSong::create($data);
        return redirect()->route('originalsong.index')->with('success', 'Оригинал песни добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $originalsong = OriginalSong::where('slug', $slug)->first();
        if (! $originalsong) {
            return back()->with('error', 'Песня не найдена!');
        }
        $songs = Song::pluck('title', 'id')->all();
        return view('admin.originalsong.edit', compact('originalsong', 'songs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OriginalSongRequest $request, $slug)
    {
        $originalsong = OriginalSong::where('slug', $slug)->first();
        if (! $originalsong) {
            return back()->with('error', 'Песня не найдена!');
        }

        $data = $request->validated();

        $data['song_name'] = OriginalSong::uploadAudio($request, $originalsong->song_name);
        $originalsong->update($data);
        return redirect()
            ->route('originalsong.index')->with('success', 'Песня изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $originalsong = OriginalSong::where('slug', $slug)->first();

        if ($originalsong) {
            if ($originalsong->song_name) {
                Storage::delete($originalsong->song_name);
            }
            $originalsong->delete();
            return redirect()->route('originalsong.index')->with('success', 'Песня удалена!');
        }
        return back()->with('error', 'Песня не найдена!');
    }
}
