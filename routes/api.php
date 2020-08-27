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
        Route::get('/{channel_id}/{date}/timezone/{timezone}', ['as' => 'channel.timetable', 'uses' => 'ChannelController@getTimetable']);
        Route::get('/{channel_id}/programmes/{programme_id}', ['as' => 'channel.programme', 'uses' => 'ChannelController@getProgramme']);
        Route::get('/', ['as' => 'channel', 'uses' => 'ChannelController@index']);
    });
