<?php

namespace App\Models;

use App\Traits\UUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, UUIDAsPrimaryKey;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];
}
