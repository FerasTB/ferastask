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
        // if ($this->bloodTests->bloodTest_id != null) {
        //     $bloodTest_id = new BloodTestResource(bloodTest::find($this->bloodTests->bloodTest_id));
        // } else {
        //     $bloodTest_id = null;
        // }
        return [
            'id' => $this->id,
            'status' => RequestStatus::getKey((int)$this->status),
            'comment' => $this->comment,
            'bloodTests' => BloodTest_idResource::collection($this->bloodTests),
            'radiographs' => Radiograph_idResource::collection($this->radiographs),
            'attachments' => $this->attachments,
            'created_at' => $this->created_at,

        ];
    }
}
