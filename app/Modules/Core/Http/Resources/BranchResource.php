<?php

namespace App\Modules\Core\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Membership\Http\Resources\MemberDetailResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'church_id' => $this->church_id,
            'date_established' => $this->date_established,

            'members' => MemberDetailResource::collection( $this->getMembers ),
        ];
    }
}
