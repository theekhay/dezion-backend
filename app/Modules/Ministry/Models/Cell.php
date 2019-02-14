<?php

namespace App\Modules\ministry\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Ministry\Models\District;
use App\Traits\UuidTrait;
use App\Traits\AddStatusTrait;
use App\Traits\OnlyActive;
use App\Traits\AddCreatedBy;

/**
 * @SWG\Definition(
 *      definition="Cell",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Cell extends Model
{
    use SoftDeletes, UuidTrait, AddStatusTrait, OnlyActive, AddCreatedBy;

    public $table = 'cells';


    protected $dates = ['deleted_at'];


    public $fillable = [

        'name', 'code', 'date_created', 'uuid', 'status', 'created_by', 'updated_by', 'deleted_by',
        'district_id', 'leader_phone_number', 'leader_email', 'leader_name', 'leader_member_id', 'address',
        'community_id', 'zone_id', 'community_name', 'district_name', 'zone_name', 'leader_mobile_number',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|unique:cells',
        'code' => 'nullable|string|unique:cells',
        'date_created' => 'nullable|date',
        'district_id' => 'nullable|numeric|exists:districts,id',
        'community_id' => 'nullable|numeric|exists:communities,id',
        'zone_id' => 'nullable|numeric|exists:zones,id',
        'leader_email' => 'nullable|email',
        //'address' => 'required|string|unique:cells'
        'address' => 'required|string'
    ];


    /**
     * returns the district a cell belongs to
     */
    public function district(){

        return $this->belongsTo( District::class, 'district_id' );
    }



}
