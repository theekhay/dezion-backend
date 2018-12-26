<?php

namespace App\Modules\Core\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Modules\Membership\Http\Resources\MemberTypeResource;

class ChurchResource extends JsonResource
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

      return  [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'active' => $this->active,
            'created_by' => $this->created_by,
            'headquarters' => $this->headquaters,
            'logo' => $this->logo,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'date_established' => $this->date_established,

            //externaldata
            'branches' => BranchResource::collection( $this->getBranches ),
            'member-types' => MemberTypeResource::collection( $this->getMemberTypes ),

      ];
    }


    public function with($request)
    {
        return [
            'branches' => BranchResource::collection( $this->getBranches )
        ];

    }
}
