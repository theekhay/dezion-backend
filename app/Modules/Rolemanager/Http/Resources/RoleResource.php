<?php

namespace App\Modules\Rolemanager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Permission;

class RoleResource extends JsonResource
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
            'name' => $name,
            'guard_name' => $guard_name,
            'church_id' => $church_id,
            'permissions' => PermissionResource::collection( $this->permissions),
        ];
    }
}
