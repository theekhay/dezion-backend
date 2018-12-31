<?php

namespace App\Modules\Membership\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//traits
use App\Traits\AddCreatedBy;

/**
 * @SWG\Definition(
 *      definition="MemberType",
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
class MemberType extends Model
{
    use SoftDeletes, AddCreatedBy;

    public $table = 'member_types';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'church_id', 'created_by', 'code', 'excluded_branches'
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
        'name' => 'required|string|unique_with:member_types,church_id|not_in:First timers,Members, members, firsttimers, first timers',
        'excluded_branches' => 'nullable|json',
        'code' => 'nullable|unique_with:member_types,church_id|max:10|alpha_num',
    ];


    /**
     * These are member types defines by the system
     * They would appear accross board for all churches
     * We create system defined membertypes to reduce the occurrence of repitition
     */
    public const SYSTEM_DEFINED = 999;

    /**
     * These are member types defined by individual churches
     * They would only appear for the churches
     */
    public const USER_DEFINED = 111;


    /**
     * Gets the list of system defined member types
     *
     */
    public function getSystemDefinedMemberTypes()
    {
        return self::all()->where('type', self::SYSTEM_DEFINED);
    }


}
