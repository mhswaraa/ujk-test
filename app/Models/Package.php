<?php
// app\Models\Package.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    // Biarkan guarded kosong, atau daftarkan langsung kolom yang boleh diisi
    // protected $guarded = [];

    // Atau (lebih eksplisit) daftarkan kolom-kolom yang boleh di-mass-assignment:
    protected $fillable = [
        'name',
        'speed',
        'price',
    ];

    // Jika ada relasi:
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
