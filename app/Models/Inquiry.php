<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'profession_role',
        'program_name',
        'message',
        'ip_address',
        'status',
        'admin_notes',
    ];
}

