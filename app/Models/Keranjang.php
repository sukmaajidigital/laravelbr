<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Relasi ke model Produk.
     * Setiap keranjang memiliki satu produk.
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    /**
     * Relasi ke model Member atau User.
     * Setiap keranjang dimiliki oleh satu member.
     */
    public function member()
    {
        return $this->belongsTo(User::class, 'id_member'); // Asumsi model User digunakan untuk member
    }
}
