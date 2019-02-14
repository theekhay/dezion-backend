<?php

namespace App\Modules\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Core\Http\Resources\BranchResource;
use App\Modules\Core\Models\Branch;

class AdminBranchResource extends JsonResource
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
            // 'id' => $this->id,
            // 'admin_id' => $this->admin_id,
            // 'branch_id' => $this->branch_id,
            // 'branch' =>
            new BranchResource( Branch::findOrFail($this->branch_id) ),
        ];
    }
}
