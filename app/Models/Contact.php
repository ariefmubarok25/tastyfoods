<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Nama tabel (opsional, tapi aman)
    protected $table = 'contacts';

    // Field yang boleh diisi lewat form (mass assignment)
    protected $fillable = [
        'subject',
        'name',
        'email',
        'message',
    ];
}
