<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'available_date',
        'available_time',
    ];
}
