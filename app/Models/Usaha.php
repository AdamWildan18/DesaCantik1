<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    use HasFactory;
    public $table = "usaha";
    protected $guarded = [];
    // protected $keyType = 'string';
    // public $timestamps = false;

    public function penduduks()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
