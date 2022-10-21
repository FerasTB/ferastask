<?php

namespace App\Http\Resources;

use App\Enums\RequestStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
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
            'id' => $this->id,
            'status' => RequestStatus::getKey((int)$this->status),
            'comment' => $this->comment,
            'bloodTests' => $this->bloodTests,
            'radiographs' => $this->radiographs,
            'attachments' => $this->attachments,
        ];
    }
}
