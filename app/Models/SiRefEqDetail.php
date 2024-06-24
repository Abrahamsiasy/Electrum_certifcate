<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiRefEqDetail extends Model
{
    use HasFactory;

    protected $table = 'si_ref_eq_details';

    protected $fillable = [
        'eq_id',
        'eq_name',
        'brand',
        'model',
        'serial_no',
    ];
}
