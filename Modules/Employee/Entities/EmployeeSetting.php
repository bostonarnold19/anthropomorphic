<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\UuidForKey;

class EmployeeSetting extends Model
{
    use UuidForKey;

    protected $table = 'employee_settings';

    public $fillable = [
        'employee_id',
        'key',
        'value',
    ];
}
