<?php


namespace App\Http\Resources\Channel;


use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ChannelResource
 * @package App\Http\Resources\Channel
 * @mixin Channel
 */
class ChannelResource extends JsonResource
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
            'icon' => $this->icon
        ];
    }
}
