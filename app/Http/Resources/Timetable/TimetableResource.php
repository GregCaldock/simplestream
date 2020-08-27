<?php


namespace App\Http\Resources\Timetable;


use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TimetableResource
 * @package App\Http\Resources\Timetable
 * @mixin Timetable
 */
class TimetableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'programme_name' => $this->name,
            'start_time' => $this->timetables->first()->start_time,
            'end_time' => $this->timetables->first()->end_time,
            'duration' => $this->duration
        ];
    }
}
