<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location'; // <-- Tambahkan ini

    protected $fillable = [
        'src_link',
    ];
}
