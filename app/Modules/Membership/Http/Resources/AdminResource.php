<?php

namespace App\Modules\Notify\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Core\Http\Resources\BranchResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [

            'id' => $this->id,
            'firstname' => $this->firstname,
            'surname' => $this->surname,
            'username' => $this->username,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'church_id' => $this->church_id,
            'member_id' => $this->member_id,

            //'branch' = BranchResource::collection( $this->getMembers ),$this->branch(),
        ];
    }
}