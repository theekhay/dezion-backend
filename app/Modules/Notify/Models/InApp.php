<?php

namespace App\Modules\Notify\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InApp extends Model
{
    use SoftDeletes;

    public $table = 'in_app_messages';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sender', 'recipient', 'message', 'reply_to'
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
}
