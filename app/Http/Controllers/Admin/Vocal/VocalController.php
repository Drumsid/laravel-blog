<?php

namespace App\Http\Controllers\Admin\Vocal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VocalRequest;
use App\Models\Vocal;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;

class VocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vocals = Vocal::orderBy('created_at', 'DESC')->get();
        return view('admin.vocal.index', compact('vocals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::pluck('title', 'id')->all();
        return view('admin.vocal.create', compact('songs',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VocalRequest $request)
    {
        $data = $request->validated();
        
        $data['vocal'] = Vocal::uploadAudio($request);
        $vocal = Vocal::create($data);
        return redirect()->route('vocal.index')->with('success', 'Партия добавлена!');
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
        $vocal = Vocal::where('slug', $slug)->first();
        if (! $vocal) {
            return back()->with('error', 'Партия не найдена!');
        }
        $songs = Song::pluck('title', 'id')->all();
        return view('admin.vocal.edit', compact('vocal', 'songs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VocalRequest $request, $slug)
    {
        $vocal = Vocal::where('slug', $slug)->first();
        if (! $vocal) {
            return back()->with('error', 'Партия не найдена!');
        }

        $data = $request->validated();

        $data['vocal'] = Vocal::uploadAudio($request, $vocal->vocal);
        $vocal->update($data);
        return redirect()
            ->route('vocal.index')->with('success', 'Партия изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $vocal = Vocal::where('slug', $slug)->first();

        if ($vocal) {
            if ($vocal->vocal) {
                Storage::delete($vocal->vocal);
            }
            $vocal->delete();
            return redirect()->route('vocal.index')->with('success', 'Партия удалена!');
        }
        return back()->with('error', 'Партия не найдена!');
    }
}
