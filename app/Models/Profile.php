<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    // 一括割り当てを許可する属性
    protected $fillable = [
        'user_id',
        'kana',
        'birth_date',
        'phone_number',
        'education',
        'school_name',
        'graduation_date',
        'qualifications',
    ];
}
