<?php

namespace App\Modules\ServiceManager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Servicemanager\Http\Resources\ServiceDataCategoryResource;

class ServiceDataCategoryProvisionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'data_categories' => new ServiceDataCategoryResource( $this->dataCategory ),
        ];
    }
}
