<?php

namespace App\Http\Resources;

use App\Models\bloodTest;
use Illuminate\Http\Resources\Json\JsonResource;

class BloodTest_idResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $bloodTest = bloodTest::find($this->bloodTest_id);
        return [
            'id' => $bloodTest->id,
            'name' => $bloodTest->testName,
            'comment' => $bloodTest->comment,
        ];;
    }
}
