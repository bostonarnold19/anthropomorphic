<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\UuidForKey;

class Employee extends Model
{
    use UuidForKey, SoftDeletes;

    public $fillable = [
        'user_id',
        'employee_id',
        'rfid',
        'fingerprint',
        'first_name',
        'last_name',
        'middle_name',
        'address',
        'profile_picture',
        'gender',
        'birthdate',
        'mobile',
        'telephone',
        'marital_status',
        'date_hired',
        'date_regular',
        'date_retirement',
        'educational_level',
        'created_by',
    ];
}
