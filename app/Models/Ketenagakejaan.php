<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ketenagakejaan extends Model
{
    use HasFactory;
    public $table = 'pekerjaan';
    use HasFormatRupiah;
    // public $timestamps = false;
    public $guarded = ['id'];

    public function penduduks(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
