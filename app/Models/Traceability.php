<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traceability extends Model
{
    use HasFactory;

    protected $table = 'traceability';

    protected $fillable = [
        'eq_id',
        'eq_ame',
        '1st_statement',
        '2nd_Statement_new',
        'certificate_no_after_23_october_2023',
        'chain',
        'lab',
    ];
}
