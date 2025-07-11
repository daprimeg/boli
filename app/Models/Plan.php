<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'membership_plans';  // specify the actual table name

    protected $fillable = [
        'plan_name',
        'short_desc',
        'description',
        'price',
        'duration_unit',
        'duration_value'
    ];
}
