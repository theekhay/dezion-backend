<?php

namespace App\Modules\Membership\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Modules\Notify\Traits\MessageTrait;
use App\Traits\UuidTrait;

/**
 * @SWG\Definition(
 *      definition="MemberDetail",
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
class MemberDetail extends Model
{
    use SoftDeletes, AddCreatedBy, UuidTrait;


    public $table = 'member_details';


    protected $dates = ['deleted_at'];


    public $fillable = [

        'firstname', 'surname', 'email', 'address', 'telephone',
        'middlename', 'created_by', 'batch', 'is_bulk', 'branch_id', 'member_type_id', 'data',
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

        'firstname' => 'required|alpha',
        'surname'   => 'required|alpha',
        'middlename'   => 'nullable|alpha',
        'address'   => 'nullable|string',
        'email'   => 'nullable|email|unique_with:member_details,branch_id',
        'branch_id' => 'required|numeric|exists:branches,id',

        /**
         * I excluded phone codes e.g +234
         * I wanted them to be added with the phone numbers
         */
        'telephone'   => 'nullable|string|unique_with:member_details,branch_id',
        'member_type_id' => 'required|numeric|exists:member_types,id'
    ];


    /**
     * Deletes a list of entries by batch;
     * This is used during bulk import to track every import by batch
     */
    public static function DeleteByBatch($batch)
    {
        self::where('batch', $batch)->forceDelete();
    }


}
