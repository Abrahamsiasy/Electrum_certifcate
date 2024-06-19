<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiCalPoint extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if the table name matches the model name in snake_case)
    protected $table = 'si_cal_points';

    // Define the fillable properties
    protected $fillable = [
        'eq_id',
        'sensor_id',
        'split_no',
        'point_no',
        'ref_val',
        'value',
        'p_uncert',
        'cal_date',
    ];

    // Disable timestamps if you don't want to use created_at and updated_at
    public $timestamps = false;
}
