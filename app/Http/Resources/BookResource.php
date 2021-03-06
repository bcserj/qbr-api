<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    private $includeRandomCode = false;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $response = [
            'id' => $this->id,
            'days' => $this->days,
            'cost' => $this->days * $this->blocks->map->properties->sum('cost_per_day'),
            'temperature' => $this->temperature,
        ];

        if ($code = $this->when($this->includeRandomCode, $this->random_code)) {
            $response = array_merge_recursive($response, ['code' => $code]);
        }

        $response = array_merge_recursive($response, [
            'location' => [
                'title' => $this->location->title,
                'timezone' => $this->location->timezone->name,
                'start_booking_timezone_date' => $this->start_booking_date
            ],
            'blocks' => [
                'count' => $this->blocks->count()
            ]
        ]);

        return $response;
    }


    public function includeRandomCode()
    {
        $this->includeRandomCode = true;
        return $this;
    }
}
