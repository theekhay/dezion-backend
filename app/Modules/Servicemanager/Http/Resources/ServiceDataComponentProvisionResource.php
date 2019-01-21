<?php

namespace App\Modules\ServiceManager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceDataComponentProvisionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
