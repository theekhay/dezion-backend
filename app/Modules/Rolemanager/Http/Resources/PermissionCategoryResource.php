<?php

namespace App\Modules\Rolemanager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionCategoryResource extends JsonResource
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
           'uuid' => $this->uuid,
           'name' => $this->name,
           'code' => $this->code,
           'status' => $this->status,
           'allowed' => $this->allowed,
           'excluded' => $this->excluded,
           'permissions' =>  PermissionResource::collection( $this->permisssions ),


       ];
    }
}
