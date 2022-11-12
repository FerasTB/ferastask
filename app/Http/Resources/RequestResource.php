<?php

namespace App\Http\Resources;

use App\Models\bloodTest;
use App\Enums\RequestStatus;
use App\Models\Radiograph;
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
            'bloodTests' => new BloodTestResource(bloodTest::find($this->bloodTests->bloodTest_id)),
            'radiographs' => new RadiographResource(Radiograph::find($this->radiographs->radiograph_id)),
            'attachments' => $this->attachments,
            'created_at' => $this->created_at,

        ];
    }
}
