<?php

namespace Modules\GlobalSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\UuidForKey;

class GlobalSetting extends Model
{
    use UuidForKey;

    protected $table = 'global_settings';

    public $fillable = [
        'key',
        'value',
    ];
}
