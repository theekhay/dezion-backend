<?php

namespace App\Modules\Core\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modules\Membership\Models\MemberType;
use App\Modules\Membership\Models\Administrator;
use Illuminate\Support\Str;

use App\Traits\AddCreatedBy;

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
    use SoftDeletes, AddCreatedBy ;

    public $table = 'churches';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'code', 'date_established', 'logo', 'slogan', 'created_by', 'mode', 'activation_key'
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
    ];



    /**
     * Defines the relationship between a church and a branch
     */
    public function getBranches()
    {
        return $this->hasMany(AdminBranch::class, 'church_id')->where('active', true);
    }


    /**
     * Defines the relationship between a church and membertypes
     */
    public function getMemberTypes()
    {
        return $this->hasMany(MemberType::class, 'church_id')->where('active', true)->orWhere('type', MemberType::SYSTEM_DEFINED );
    }



    /**
     * Generate an appkey for the church.
     */
    public static function generateAppKey() : String
    {

        do{
            $church_key = (string) Str::uuid();
        }
        while
        (
            static::ChurchKeyExists($church_key)
        );

        return $church_key;

    }



    /**
     * check if church key is unique.
     * @return boolean
     */
    private static function ChurchKeyExists( String $church_key) : bool
    {
        return self::where('activation_key', $church_key)->count() > 0 ;
    }


    /**
     * Get the administrators for a church
     * @return Administrators
     */
    public function getAdministrators()
    {
        return $this->hasMany(Administrator::class );
    }


    /**
     * Returns the church the app key belongs to
     * @param Key
     * @return Church
     */
    public static function resolveChurchKey( $key)
    {
        $church = Church::where('activation_key' , $key )->first();

        return ! empty( $church ) ? $church :  NULL;

    }

}
