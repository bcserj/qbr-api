<?php

namespace App\Http\Resources;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'params' => [
                'days' => $this->days,
                'cost' => $this->days * $this->blocks->map->properties->sum('cost_per_day'),
                'temperature' => $this->temperature,
                'location' => [
                    'title' => $this->location->title,
                    'timezone' => $this->location->timezone->name,
                    'start_booking_timezone_date' => $this->start_booking_date
                ],
                'blocks' => [
                    'count' => $this->blocks->count('id')
                ]
            ]
        ];
    }
}
