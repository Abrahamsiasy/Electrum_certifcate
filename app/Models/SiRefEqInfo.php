<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiRefEqInfo extends Model
{
    use HasFactory;
    protected $table = 'si_ref_eq_info';

    protected $fillable = [
        'eq_name',
        'brand',
        'model',
        'serial_no',
        'eq_id',
        'sensor_sn',
        'sensor_id',
        'split_no',
        'c0',
        'c1',
        'c2',
        'c3',
        'c4',
        'Serr',
        'range_min',
        'range_max',
        'cal_date',
        'uncert',
        'cmc',
        'res',
        'unit'
    ];
}
