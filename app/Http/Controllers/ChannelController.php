<?php

namespace App\Http\Controllers;

use App\Http\Resources\Channel\ChannelCollection;
use App\Http\Resources\Programme\ProgrammeResource;
use App\Http\Resources\Timetable\TimetableCollection;
use App\Models\Channel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class ChannelController extends Controller
{
    /**
     * Gets a list of all channels sorted by channel name
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $channels = Channel::orderBy('name', 'asc')->get();

        return Response::json(['data' => ChannelCollection::collection($channels)]);
    }

    /**
     * Get's a channels timetable by date and timezone
     *
     * @param string $channel_id
     * @param string $date
     * @param string $timezone
     * @return JsonResponse
     */
    public function getTimetable(string $channel_id, string $date, string $timezone): JsonResponse
    {
        $channel = Channel::find($channel_id);
        if(!$channel) {
            Response::json(['status' => 'error', 'message' => 'channel not found'], 404);
        }

        // create date range based on timezone
        $start_time = Carbon::parse($date)->startofDay()->timezone($timezone);
        $end_time = Carbon::parse($date)->endofDay()->timezone($timezone);

        $timetable = $channel->programmes()->whereHas('timetables', static function(Builder $q) use ($start_time, $end_time) {
            $q->whereBetween('start_time', [$start_time, $end_time]);
        })->get()->sortBy('timetables.start_time');

        return Response::json(['data' => TimetableCollection::collection($timetable)]);
    }

    /**
     * Get a channel's programme by id
     *
     * @param string $channel_id
     * @param string $programme_id
     * @return JsonResponse
     */
    public function getProgramme(string $channel_id, string $programme_id)
    {
        $channel = Channel::find($channel_id);
        if(!$channel) {
            Response::json(['status' => 'error', 'message' => 'channel not found'], 404);
        }

        $programme = $channel->programmes()->find($programme_id);
        if(!$programme) {
            Response::json(['status' => 'error', 'message' => 'programme not found'], 404);
        }

        return Response::json(['data' => new ProgrammeResource($programme)]);
    }
}
