<?php

namespace App\Modules\Rolemanager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Permission;
use App\Modules\Core\Models\Church;

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
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'church' => Church::find( $this->church_id ),
            'permissions' => PermissionResource::collection( $this->permissions),
        ];
    }
}
