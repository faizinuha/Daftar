<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'nis',
        'name',
        'asal_sekolah',
        'alamat',
        'name_wali',
        'no_telepon',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
