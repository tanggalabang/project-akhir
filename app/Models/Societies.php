<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societies extends Model
{
    use HasFactory;

    protected $table = 'societies';

    protected $guarded = [
        'id',
    ];
}
