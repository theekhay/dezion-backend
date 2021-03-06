<?php

namespace App\Modules\Membership\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="BulkMemberImport",
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
class BulkMemberImport extends Model
{
    use SoftDeletes;

    public $table = 'bulk_member_imports';


    protected $dates = ['deleted_at'];


    public $fillable = [

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

        'branch_id' => 'required|numeric|exists:branches,id',
        'member_type_id' => 'required|numeric|exists:member_types,id',
        'import' => 'required|file|mimes:csv,txt,xlsx,xls',
    ];


    /**
     * Allowed File formats for imports
     */
    public static $allowedFileFormats = ['csv', 'xls', 'xlsx'];


    /**
     * gets the headers from an import
     * this is returned as an array
    */
    public static function getImportHeaders( $import )
    {
        $headings = (new HeadingRowImport)->toArray( $import );
        return array_filter($headings[0][0]);
    }


}
