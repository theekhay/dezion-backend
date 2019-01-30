<?php

namespace App\Modules\Ministry\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Traits\UuidTrait;
use App\Traits\AddStatusTrait;
use App\Modules\ministry\Models\Community;
use App\Modules\ministry\Models\Zone;
use App\Modules\ministry\Models\Cell;
use App\Traits\OnlyActive;

/**
 * @SWG\Definition(
 *      definition="District",
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
class District extends Model
{
    use SoftDeletes, AddCreatedBy, UuidTrait, AddStatusTrait, OnlyActive;


    public $table = 'districts';


    protected $dates = ['deleted_at'];


    public $fillable = [

        'name', 'code', 'created_by', 'uuid', 'head', 'deleted_by', 'status', 'updated_by',
        'head_phone_number', 'head_name', 'head_email', 'head_member_id'
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

        'name' => 'required|string|unique:districts,name',
        'code' => 'nullable|unique|alpha_num|max:10|unique:districts,code',
        'head_member_id' => 'nullable|numeric"exists:member_details,id',
        //'status' => 'required|numeric',
       // 'uuid' => 'required|unique:districts,uuid'
    ];


    /**
     * Defines the relationship between a didtrict and a community
     * all communities must belong to a district
     * @return Community
     */
    public function communities(){

        return $this->hasMany( Community::class, 'district_id');
    }


    /**
     * Defines the relationship between a didtrict and a zone
     * all zones belong to a community
     * which in turn belongs to a district
     * @return Zone
     */
    public function zones(){

        return $this->hasMany( Zone::class, 'district_id');
    }



    /**
     * Defines the relationship between a district and a cell
     * all cells must belong to a district via relationship with community and zone
     * @return Cell
     */
    public function cells(){

        return $this->hasMany( Cell::class, 'district_id');
    }


}
