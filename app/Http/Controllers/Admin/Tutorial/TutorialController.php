<?php

namespace App\Http\Controllers\Admin\Tutorial;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use App\Models\Song;
use Illuminate\Http\Request;
use Cohensive\OEmbed\Facades\OEmbed;
use App\Http\Requests\TutorialRequest;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutorials = Tutorial::orderBy('created_at', 'DESC')->get();
        return view('admin.tutorial.index', compact('tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::pluck('title', 'id')->all();
        return view('admin.tutorial.create', compact('songs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TuturialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TutorialRequest $request)
    {
        $validated = $request->validated();
        $embed = OEmbed::get($validated['link']);

        if ($embed) {
            $tutorialData = [
                'title' => $validated['title'],
                'link' => $validated['link'],
                'iframe' => $embed->html(),
                'thumbnail' => ($embed->hasThumbnail()) ? $embed->thumbnail()['url'] : 'no-thumbnail',
                'description' => $validated['description'],
                'song_id' => $validated['song_id'],
            ];
            $tutorial = Tutorial::create($tutorialData);
            return redirect()->route('tutorial.index')->with('success', 'Туториал добавлен!');
        }
        return back()->with('error', 'Что то пошло не так, возможно ссылка на видео не корректна!');
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
        $tutorial = Tutorial::where('slug', $slug)->first();
        if (! $tutorial) {
            return back()->with('error', 'Туториал не найден!');
        }
        $songs = Song::pluck('title', 'id')->all();
        return view('admin.tutorial.edit', compact('tutorial', 'songs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TutorialRequest $request, $slug)
    {
        $tutorial = Tutorial::where('slug', $slug)->first();
        if (! $tutorial) {
            return back()->with('error', 'Туториал не найден!');
        }

        $validated = $request->validated();

        if ($validated['link'] !== $tutorial->link) {
            $embed = OEmbed::get($validated['link']);
            if ($embed) {
                $validated = [
                    'title' => $validated['title'],
                    'link' => $validated['link'],
                    'iframe' => $embed->html(),
                    'thumbnail' => ($embed->hasThumbnail()) ? $embed->thumbnail()['url'] : 'no-thumbnail',
                    'description' => $validated['description'],
                    'song_id' => $validated['song_id'],
                ];
            } else {
                return back()->with('error', 'Что то пошло не так, возможно ссылка на видео не корректна!');
            }
        }

        $tutorial->update($validated);
        return redirect()
                ->route('tutorial.index')->with('success', 'Туториал изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $tutorial = Tutorial::where('slug', $slug)->first();
        if ($tutorial) {
            $tutorial->delete();
            return redirect()->route('tutorial.index')->with('success', 'Туториал удален!');
        }
        return back()->with('error', 'Туториал не найден!');
    }
}
