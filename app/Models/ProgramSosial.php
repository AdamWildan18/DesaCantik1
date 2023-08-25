<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramSosial extends Model
{
    use HasFactory;
    public $table = "sosial";
    protected $guarded = ['id'];
    // protected $keyType = 'string';
    // public $timestamps = false;

    public function penduduks(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
