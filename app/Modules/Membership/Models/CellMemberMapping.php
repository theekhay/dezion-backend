<?php

namespace App\Modules\Membership\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Traits\UuidTrait;

/**
 * @SWG\Definition(
 *      definition="CellMemberMapping",
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
class CellMemberMapping extends Model
{
    use SoftDeletes, AddCreatedBy, UuidTrait;

    public $table = 'cell_member_mappings';


    protected $dates = ['deleted_at'];


    public $fillable = [

        'church_id', 'member_id', 'mapped_model_id', 'mapped_model', 'status',
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

        'church_id' => 'required|numeric|exists:churches,id',
        'mapped_model' => 'required|string',
        'mapping_data' => 'required'
    ];


}
