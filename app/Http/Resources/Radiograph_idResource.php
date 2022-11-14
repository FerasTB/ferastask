<?php

namespace App\Http\Resources;

use App\Models\Radiograph;
use Illuminate\Http\Resources\Json\JsonResource;

class Radiograph_idResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $radiograph = Radiograph::find($this->radiograph_id);
        return [
            'id' => $radiograph->id,
            'name' => $radiograph->radiographName,
            'comment' => $radiograph->comment,
        ];
    }
}
