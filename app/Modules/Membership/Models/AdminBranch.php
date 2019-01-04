<?php

namespace App\Modules\Membership\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Modules\Membership\Models\Administrator;

/**
 * @SWG\Definition(
 *      definition="AdminBranch",
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
class AdminBranch extends Model
{
    use SoftDeletes, AddCreatedBy;

    public $table = 'admin_branches';


    protected $dates = ['deleted_at'];


    public $fillable = [

        'admin_id', 'branch_id', 'created_by',

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

    ];


    public function admin()
    {
        return $this->belongsTo(Administrator::class, 'id', 'admin_id' );
    }


}
