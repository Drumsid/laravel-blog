@extends('layouts.front')
@section('otherStyle')
<link rel="stylesheet" href="{{ asset('front/plugins/listnav/css/listnav.css') }}">
<style>
    .ln-letters a {
        margin: 5px 1px;
        border-right: 1px solid silver;
        ;
    }

    .ln-letters a:nth-child(32) {
        clear: both;
        background-color: red;
    }

    .english-p {
        clear: both;
    }

    .songs-abc-wrap {
        margin: 30px 0 0 0;
        padding: 10px 0 0 0;
    }

    .songs-content {
        margin-top: 40px;
    }

    #songsList {
        list-style: none;
        padding: 15px;
        margin: 30px 0 0 0;
    }

    #songsList li {
        margin: 15px 0;
        font-size: 18px;
        /* position: relative; */
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .ln-no-match {
        display: block !important;
    }

    #songsList-nav {
        border: 1px solid silver;
        border-radius: 10px;
        padding: 10px;
    }

</style>
@endsection
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="songs-abc-wrap">
            <h3>Выбор песен по алфавиту</h3>
            <p>Общее количество песен: <b>{{ $songCount }}</b></p>
            <div class="songs-content">
                <ul id="songsList">
                    @forelse ($songs as $song)

                    <li>
                        <a href="{{ route('showSong', $song) }}">
                            <span>{{ $song->title }}</span>
                        </a>
                        <span>
                            @if ($song->dpm)
                            <span class="song-dpm">dpm: <b>{{ $song->dpm }}</b></span>
                            @endif
                            @if ($song->tonica)
                            <span class="song-ton ml-2">ton: <b>{{ $song->tonica }}</b></span>
                            @endif
                        </span>


                    </li>

                    @empty
                    no song
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('otherScripts')
<script src="{{ asset('front/plugins/listnav/js/jquery-listnav.js') }}"></script>
<script src="{{ asset('front/plugins/listnav/js/vendor.js') }}"></script>

<script>
    $(function () {
        $('#songsList').listnav({
            includeOther: true,
            initLetter: 'а',
            allText: 'Все',
            letters: ['_', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'к', 'л', 'м', 'н', 'о',
                'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'э', 'ю', 'я', 'a', 'b', 'c',
                'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
                'u', 'v', 'w', 'x', 'y', 'z'
            ],
            onClick: function (letter) {
                let sinlLetter = $(".ln-selected").html();
                $(".letter-span").empty()
                $(".letter-span").append(sinlLetter);
            },
            noMatchText: 'На букву "<span class="letter-span">А</span>" песен не найдено, выберите другую букву!',
        });
    });

</script>
<script>
    $(function () {
        $(".ln-letters").before("<p>Русские буквы</p>");
        $(".a").before("<br><br><p class='english-p'>Английские буквы</p>");
        $(".я").css("border-right-style", "solid");
    });

</script>
@endsection
