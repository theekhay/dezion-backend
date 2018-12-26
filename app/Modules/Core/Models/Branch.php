<?php

namespace App\Modules\Core\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Membership\Models\MemberDetail;

/**
 * @SWG\Definition(
 *      definition="Branch",
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
class Branch extends Model
{
    use SoftDeletes;

    public $table = 'branches';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'code', 'church_id', 'date_established', 'address', 'created_by',
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

        'church_id' => 'required|integer|exists:churches,id',
        'name' => 'required|string|unique_with:branches,church_id',
        'code' => 'nullable|unique:branches,code|max:10|alpha_num',
        'date_established' => 'nullable|date|before_or_equal:today',
        //this rule should make sure the branch established date is not greater than the church it belongs to
        //'date_established' => 'before_or_equal:today'
    ];


    public function getChurch()
    {
        return $this->belongsTo(App\Modules\Core\Models\Church::class);
    }


    public function getMembers()
    {
        return $this->hasMany(MemberDetail::class, 'branch_id');
    }





}
