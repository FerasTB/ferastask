<?php

namespace App\Http\Resources;

use App\Enums\TicketCategory;
use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Enums\UserRole;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketSupportResource extends JsonResource
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
            'title' => $this->title,
            'problem' => $this->problem,
            'user' => new UserIndexResource($this->user),
            'status' => TicketStatus::getKey($this->status),
            'priority' => TicketPriority::getKey($this->priority),
            'category' => TicketCategory::getKey($this->category),
            'agent' => UserRole::getKey($this->agent),
            'consultation' => new ConsultationWithPatientAndUserResource($this->consultation),
            'comments' => CommentResource::collection($this->comments),
        ];
    }
}
