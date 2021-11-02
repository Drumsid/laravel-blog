@extends('layouts.front')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="alphabet mt-5 mb-5">
            <p>тут будет фильтр по алфавиту</p>
        </div>
        <div class="songs-content">
            <ul>
                @forelse ($songs as $song)
                <a href="{{ route('showSong', $song) }}">
                    <li>{{ $song->title }}</li>
                </a>
                @empty
                no song
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
