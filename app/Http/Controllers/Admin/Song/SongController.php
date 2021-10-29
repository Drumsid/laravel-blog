<?php

namespace App\Http\Controllers\Admin\Song;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Vocal;
use App\Http\Requests\SongRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::orderBy('created_at', 'DESC')->get();
        return view('admin.song.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vocals = Vocal::pluck('title', 'id')->all();
        return view('admin.song.create', compact('vocals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongRequest $request)
    {
        $data = $request->validated();
        if (Auth::user()->hasAnyRole(['admin'])) {
            $data['is_approved'] = true;
        } else {
            $data['is_approved'] = false;
        }
        
        $song = Song::create($data);
        return redirect()->route('song.index')->with('success', 'Песня добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {        
        $song = Song::where('slug', $slug)->first();
        if (! $song) {
            return back()->with('error', 'Песня не найдена!');
        }
        return view('admin.song.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $song = Song::where('slug', $slug)->first();
        if (! $song) {
            return back()->with('error', 'Песня не найдена!');
        }

        $vocals = Vocal::pluck('title', 'id')->all();
        return view('admin.song.edit', compact('song', 'vocals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SongRequest $request, $slug)
    {
        $song = Song::where('slug', $slug)->first();
        if (! $song) {
            return back()->with('error', 'Песня не найдена!');
        }

        $data = $request->validated();
        $song->update($data);
        return redirect()
            ->route('song.index')->with('success', 'Песня изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $song = Song::where('slug', $slug)->first();
        if ($song) {
            if ($song->vocals) {
                foreach ($song->vocals as $vocal) {
                    Storage::delete($vocal->vocal);
                }
            }
            if ($song->originalSong) {
                Storage::delete($song->originalSong->song_name);
            }
            $song->delete();
            return redirect()->route('song.index')->with('success', 'Песня удалена!');
        }
        return back()->with('error', 'Песня не найдена!');
    }
    public function pending()
    {
        $songs = Song::where('is_approved', false)->get();
        return view('admin.song.pending', compact('songs'));
    }

    public function approval($slug)
    {
        $song = Song::where('slug', $slug)->first();
        $song->update([
            'is_approved' => true
        ]);

        return redirect(route('song.pending'))->with('success', 'Песня одобрена!!!');
    }
}
