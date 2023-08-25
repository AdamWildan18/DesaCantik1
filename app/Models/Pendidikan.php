<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Pendidikan extends Model
{
    use HasFactory;
    public $table = "pendidikan";
    protected $guarded = ['id'];
    // protected $keyType = 'string';
    // public $timestamps = false;

    public function penduduks(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
