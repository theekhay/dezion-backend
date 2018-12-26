<?php

namespace App\Modules\Core\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modules\Membership\Models\MemberType;

/**
 * @SWG\Definition(
 *      definition="Church",
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
class Church extends Model
{
    use SoftDeletes;

    public $table = 'churches';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'code', 'date_established', 'logo', 'slogan', 'created_by',
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

        'name' => 'required|string|unique:churches,name',
        'code' => 'nullable|unique:churches,code|max:10|alpha_num',
        'date_established' => 'nullable|date|before_or_equal:today'
        //'created_by' => 'required',
    ];



    /**
     * Defines the relationship between a church and a branch
     */
    public function getBranches()
    {
        return $this->hasMany(Branch::class, 'church_id')->where('active', true);
    }


    /**
     * Defines the relationship between a church and membertypes
     */
    public function getMemberTypes()
    {
        return $this->hasMany(MemberType::class, 'church_id')->where('active', true)->orWhere('type', MemberType::SYSTEM_DEFINED);
    }


}
