<?php

namespace App\Models;

use App\Models\Ketenagakejaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Penduduk extends Model
{
    use HasFactory;
    public $table = "penduduk";
    protected $guarded = ['id'];
    // public $timestamps = false;
    // protected $dates = 'tanggal_lahir';
    // protected $keyType = 'string';

    public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('nik', 'like', '%' . request('search') . '%');
        }
    }

    // public function keluarga()
    // {
    //     return $this->belongsTo(Keluarga::class);
    // }
    public function statuspenduduk()
    {
        return $this->belongsTo(StatusPenduduk::class);
    }


    public function pendidikans(): HasOne
    {
        return $this->hasOne(Pendidikan::class);
    }
    
    public function pekerjaans(): HasOne
    {
        return $this->hasOne(Ketenagakejaan::class);
    }
    public function kesehatans(): HasOne
    {
        return $this->hasOne(Kesehatan::class);
    }
    public function sosials(): HasOne
    {
        return $this->hasOne(ProgramSosial::class);
    }
    public function programs(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * Get the Penduduk that owns the Penduduk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function keluargas(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id', 'id');
    }
}
