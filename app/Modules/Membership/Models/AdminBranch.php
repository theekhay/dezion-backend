<?php

namespace App\Modules\Membership\Models;

use Illuminate\Database\Eloquent\Model;

class AdminBranch extends Model
{
    use SoftDeletes, AddCreatedBy;

    public $table = 'admin_branches';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'admin_id', 'branches'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'branches' => 'array',
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
}
