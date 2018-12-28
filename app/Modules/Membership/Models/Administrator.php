<?php

namespace App\Modules\Membership\Models;

use Eloquent as Model;
use App\Modules\Core\Models\Church;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Models\User;

/**
 * @SWG\Definition(
 *      definition="Administrator",
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
class Administrator extends User
{
    use SoftDeletes, AddCreatedBy;

    public $table = 'administrators';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'firstname', 'surname', 'email', 'telephone', 'member_id', 'church_id', 'password'
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

        'firstname' => 'required|string|alpha',
        'surname' => 'required|string|alpha',
        'email' => 'required|email|unique_with:administrators,church_id',
        'telephone' => 'required|numeric|unique_with:administrators,church_id',
        'church_id' => 'required|numeric|exists:churches,id',
        'member_id' => 'nullable|numeric|exists:member_details,id',
        'username' => 'nullable|alpha|unique_with:administrators,church_id',
        'password' => 'required|min',
    ];


    public function getChurch()
    {
        return $this->belongsTo( Church::class );
    }

}
