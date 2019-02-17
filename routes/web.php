<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Public routes.
 */
Route::get('/', 'Client\HomeController@renderHome')->name('client.home');

// Redirects to real search route.
Route::post('/vyhledavani/send_search', 'Client\SearchController@searchSend')->name('client.search');
// The real user search route
Route::get('/vyhledavani/', 'Client\SearchController@searchResults')->name('client.search_results');
Route::get('/vyhledavani/{phrase}', 'Client\SearchController@searchResults')->name('client.search_results');

Route::get('/seznam-pisni', 'Client\ListController@renderSongListAlphabetical')->name('client.song.list');
Route::get('/seznam-autoru', 'Client\ListController@renderAuthorListAlphabetical')->name('client.author.list');

// Client single model views
Route::get('/pisen/{song_lyric}/text', 'Client\SongLyricsController@songText')->name('client.song.text');
Route::get('/pisen/{song_lyric}/noty', 'Client\SongLyricsController@songScore')->name('client.song.score');
Route::get('/pisen/{song_lyric}/preklady', 'Client\SongLyricsController@songOtherTranslations')->name('client.song.translations');
Route::get('/pisen/{song_lyric}/nahravky', 'Client\SongLyricsController@songAudioRecords')->name('client.song.audio_records');
Route::get('/pisen/{song_lyric}/videa', 'Client\SongLyricsController@songVideos')->name('client.song.videos');
Route::get('/autor/{author}', 'Client\AuthorController@renderAuthor')->name('client.author');
// TODO: Songbook view
Route::get('/zpevnik/{songbook}', 'Client\SongbookController@renderSongbook')->name('client.songbook');

// Client forms
// TODO: Public content request
Route::get('/navrh/{id}', 'RequestController@request')->name('client.request');
Route::post('/navrh/{id}', 'RequestController@storeRequest')->name('client.request');

// TODO: Report song licence abuse
Route::get('/report', 'Client\ReportController@report')->name('client.report');
Route::post('/report', 'Client\ReportController@storeReport')->name('client.report');

Auth::routes(['register' => true]);
Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');

/**
 * Administrace.
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function ()
{
    Route::get('/', 'AdminController@renderDash')->name('admin.dashboard');
    Route::get('/todo', 'AdminController@renderTodo')->name('admin.todo');
    // Route::get('/manage/todo/song/setAuthor/{author_id}/{song_id}/', 'AdminController@setSongAuthor')
    //     ->name('admin.todo.setSongAuthor');

    // // External
    Route::get('/externals', 'ExternalController@index')->name('admin.external.index');
    Route::get('/external/new', 'ExternalController@create')->name('admin.external.create');
    Route::post('/external/new', 'ExternalController@store')->name('admin.external.store');
    Route::get('/external/{external}', 'ExternalController@edit')->name('admin.external.edit');
    Route::put('/external/{external}', 'ExternalController@update')->name('admin.external.update');
    Route::delete('/external/{external}', 'ExternalController@destroy')->name('admin.external.delete');

    // Route::get('/external/edit/{id}/translation', 'AdminController@renderExternalEditTranslation')
    //     ->name('admin.external.edit.translation');
    // Route::get('/external/edit/{id}/translation/{t_id}', 'AdminController@storeExternalEditTranslation')
    //     ->name('admin.external.edit.translation.save');
    // Route::get('/external/edit/{id}/author', 'AdminController@renderExternalEditAuthor')->name('admin.external.edit.author');
    // Route::get('/external/edit/{id}/author/{a_id}', 'AdminController@storeExternalEditAuthor')
    //     ->name('admin.external.edit.author.save');

    // Song
    Route::get('/songs', 'SongController@index')->name('admin.song.index');
    Route::get('/song/new', 'SongController@create')->name('admin.song.create');
    Route::post('/song/new', 'SongController@store')->name('admin.song.store');
    Route::get('/song/{song_lyric}', 'SongController@edit')->name('admin.song.edit');
    Route::put('/song/{song_lyric}', 'SongController@update')->name('admin.song.update');
    Route::delete('/song/{song_lyric}', 'SongController@destroy')->name('admin.song.delete');
    // TODO
    // Route::get('/song/{id}/add_author', 'SongController@renderAddSongAuthor')->name('admin.song.author.add');
    // Route::get('/song/{id}/remove_author/{author_id}', 'SongController@storeRemoveSongAuthor')
    //     ->name('admin.song.author.remove');

    // Author
    Route::get('/authors', 'AuthorController@index')->name('admin.author.index');
    Route::get('/author/new', 'AuthorController@create')->name('admin.author.create');
    Route::post('/author/new', 'AuthorController@store')->name('admin.author.store');
    Route::get('/author/{author}', 'AuthorController@edit')->name('admin.author.edit');
    Route::put('/author/{author}', 'AuthorController@update')->name('admin.author.update');
    Route::delete('/author/{author}', 'AuthorController@destroy')->name('admin.author.delete');
});