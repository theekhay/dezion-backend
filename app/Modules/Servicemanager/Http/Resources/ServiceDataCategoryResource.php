<?php

namespace App\Modules\Servicemanager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Servicemanager\Models\ServiceDataComponent;
use App\Modules\ServiceManager\Http\Resources\ServiceDataComponentResource;

class ServiceDataCategoryResource extends JsonResource
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
            'name' => $this->name,
            'service_id' => $this->service_id,
            'code' => $this->code,
            'allowed_branches' => $this->allowed_branches,
            'active' => $this->active,
            'created_by' => $this->created_by,
            'uuid' => $this->uuid,
            'status' => $this->status,

            'data_components' => ServiceDataComponentResource::collection( $this->dataComponents ),
        ];
    }
}
