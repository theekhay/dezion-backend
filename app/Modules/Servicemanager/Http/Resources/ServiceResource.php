<?php

namespace App\Modules\Servicemanager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\ServiceManager\Http\Resources\ServiceDataCategoryResource;
use App\Modules\Servicemanager\Models\ServiceDataCategoryProvision;
use App\Modules\ServiceManager\Http\Resources\ServiceDataCategoryProvisionResource;

class ServiceResource extends JsonResource
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
            'code' => $this->code,
            'church_id' => $this->church_id,
            'enabled_for' => $this->enabled_for,
            'active' => $this->active,
            'created_by' => $this->created_by,

           'data_categories' => ServiceDataCategoryProvisionResource::collection( $this->dataCategories ),
        ];
    }
}
