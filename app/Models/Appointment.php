<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'desired_date',
        'desired_time',
        'purpose',
        'comments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
