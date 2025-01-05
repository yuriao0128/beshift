<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesiredCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'desired_work_style',
        'desired_position',
        'desired_salary',
        'desired_location',
    ];
}