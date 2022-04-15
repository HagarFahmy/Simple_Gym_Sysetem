<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'session_name' => $this->training_session->name,
            'gym_name' => $this->training_session->gym->name,
            'attendance_starts_time'=> date('d-m-y h:i:s a', strtotime($this->training_session->starts_at)),
            'attendance_finishes_time'=> date('d-m-y h:i:s a', strtotime($this->training_session->finishes_at)),
        ];
    }
}
