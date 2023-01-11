<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $date = ['updated_at'];
    protected $table ='employees';
    protected $fillable = [
        
        'nama',
        'alamat',
        'no_telp',
        'servis',
        'keterangan',
        'kg',
        'biaya',
        'status'

    ];
}
