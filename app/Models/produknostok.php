<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produknostok extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function produknostok()
    {
        return $this->belongsTo(produknostok::class, 'id'); //ONE
    }
}