<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTasksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->task?->id , 
            'name' => $this->task?->name .' '.$this->district?->name , 
            'district' => [
                'id' => $this->district_id , 
            ] , 
        ];
    }
}
