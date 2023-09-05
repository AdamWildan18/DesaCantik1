<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Keluarga extends Model
{
    use HasFactory;
    public $table = "keluarga";
    public $guarded = [];
    // protected $keyType = 'string';


    public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('id', 'like', '%' . request('search') . '%')
            ->orWhere('nama_kepala_keluarga', 'like', '%' . request('search') . '%');
        }
    }

    
    public function relasis(): BelongsToMany
    {
        return $this->belongsToMany(Relasi::class, 'relasi');
    }
    
    public function penduduks(): HasMany
    {
        return $this->hasMany(Penduduk::class, 'keluarga_id', 'id');
    }
   
    public function bantuans(): HasOne
    {
        return $this->hasOne(Bantuan::class);
    }
    public function rumahs(): HasOne
    {
        return $this->hasOne(Rumah::class);
    }
    public function programs(): HasOne
    {
        return $this->hasOne(Program::class);
    }
    
    public function pendidikans(): HasManyThrough
    {
        return $this->hasManyThrough(Pendidikan::class, Penduduk::class);
    }
    public function pekerjaans(): HasManyThrough
    {
        return $this->hasManyThrough(Ketenagakejaan::class, Penduduk::class);
    }
    public function kesehatans(): HasManyThrough
    {
        return $this->hasManyThrough(Kesehatan::class, Penduduk::class);
    }
    public function sosials(): HasManyThrough
    {
        return $this->hasManyThrough(ProgramSosial::class, Penduduk::class);
    }
    public function usahas(): HasManyThrough
    {
        return $this->hasManyThrough(USaha::class, Penduduk::class);
    }


}
