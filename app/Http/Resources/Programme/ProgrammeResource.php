<?php


namespace App\Http\Resources\Programme;


use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProgrammeResource
 * @package App\Http\Resources\Programme
 * @mixin Programme
 */
class ProgrammeResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'start_time' => $this->timetables->first()->start_time,
            'end_time' => $this->timetables->first()->end_time,
            'duration' => $this->duration,
            'channel' => $this->channel->name
        ];
    }
}
