<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'position',
        'job_type', // 職種
        'employment_type', // 雇用形態
        'start_date',
        'end_date',
        'description',
    ];
}
