<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rumah extends Model
{
    use HasFactory;
    public $table = "rumah";
    protected $guarded = ['id'];
    // public $timestamps = false;


    public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('id', 'like', '%' . request('search') . '%')
            ->orWhere('nama_kepala_keluarga', 'like', '%' . request('search') . '%');
        }
    }

    public function keluargas(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id', 'id');
    }
}
