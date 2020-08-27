<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'channels'],
    function() {
        Route::get('/{channel_id}/{date}/timezone/{timezone}', ['as' => 'channels.timetable', 'uses' => 'ChannelsController@etTimetable']);
        Route::get('/{channel_id}/programmes/{programme_id}', ['as' => 'channels.programme', 'uses' => 'ChannelsController@getProgramme']);
        Route::get('/', ['as' => 'channels.programme', 'uses' => 'ChannelsController@index']);
    });
