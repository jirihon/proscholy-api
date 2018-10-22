<?php

namespace App\Http\Controllers;

use App\Author;
use App\SongLyric;

class ListController extends Controller
{
    public function renderSongListAlphabetical()
    {
        $song_lyrics = SongLyric::all()->where('lyrics', '!=', '')->sortBy('name');

        return view('song_list', [
            'songs' => $song_lyrics,
        ]);
    }

    public function renderAuthorListAlphabetical()
    {
        return view('author_list', [
            'authors' => Author::orderBy('name')->get(),
        ]);
    }
}
