<?php

namespace App\Modules\Core\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modules\Membership\Models\MemberType;
use App\Modules\Admin\Models\Administrator;
use Illuminate\Support\Str;

use App\Traits\AddCreatedBy;
use App\Modules\Servicemanager\Models\ServiceDataCategory;
use App\Modules\ServiceManager\Models\Service;
use App\Traits\UuidTrait;
use App\Traits\OnCreateTrait;
use App\Traits\OnlyActive;
use App\Modules\Admin\Models\ChurchAdmin;

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
    use SoftDeletes, AddCreatedBy, UuidTrait, OnlyActive ;

    public $table = 'churches';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'code', 'date_established', 'logo', 'slogan', 'mode', 'activation_key', 'created_by_email', 'created_by_telephone',
        'status'
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
        'date_established' => 'nullable|date|before_or_equal:today',

    ];



    /**
     * Defines the relationship between a church and a branch
     */
    public function getBranches()
    {
        return $this->hasMany( Branch::class, 'church_id');
    }


    /**
     * Defines the relationship between a church and membertypes
     * returns the list of member types created for a church
     * @return MemberType
     */
    public function getMemberTypes()
    {
        return $this->hasMany(MemberType::class, 'church_id');
    }



    /**
     * Generate an appkey for the church.
     */
    public static function generateAppKey() : String
    {
        do{
            $church_key = (string) Str::uuid();
        }
        while( static::ChurchKeyExists($church_key) );

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
        return $this->hasMany(Administrator::class, 'church_id' );
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


    /**
     * Defines the relationship between a church and its service Data category
     *
     */
    public function serviceDataCategory()
    {
        return $this->hasMany( ServiceDataCategory::class, 'church_id');
    }


    /**
     * Defines the relationship between a church and its services
     * @return Service
     *
     */
    public function getServices()
    {
        return $this->hasMany( Service::class, 'church_id', 'id' );
    }


    /**
     * Every church as a church Admin.
     * Think of this as the super admin for the church
     * This admin would have all the privileges allowed the church
     * @return ChurchAdmin
     */
    public function masterAdmin()
    {
        return $this->hasOne( ChurchAdmin::class, 'church_id' );
    }

}
