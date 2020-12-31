<?php

namespace Satya\EloquentActivity\Models;

use Illuminate\Database\Eloquent\Model;

class EloquentActivity extends Model
{

    /**
     * @var string
     */
    protected $table = 'eloquent_activities';

    /**
     * @var string[]
     */
    protected $fillable = [
        'system_logable_id',
        'system_logable_type',
        'user_id',
        'guard_name',
        'module_name',
        'action',
        'old_value',
        'new_value',
        'ip_address'
    ];
}
