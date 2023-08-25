<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Relasi extends Model
{
    use HasFactory;
    public $table = "relasi";
    protected $guarded = ['id'];

   /**
    * The roles that belong to the Relasi
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
//    public function keluargas()
//    {
//        return $this->belongsTo(Keluarga::class, );
//    }
    public function penduduks()
    {
        return $this->belongsTo(Penduduk::class, );
    }
    public function rumahs()
    {
        return $this->belongsTo(Rumah::class, );
    }
    public function pekerjaans()
    {
        return $this->belongsTo(Ketenagakejaan::class, );
    }
    public function usahas()
    {
        return $this->belongsTo(Usaha::class, );
    }
    public function kesehatans()
    {
        return $this->belongsTo(Kesehatan::class, );
    }
    public function programs()
    {
        return $this->belongsTo(Program::class, );
    }
    public function sosials()
    {
        return $this->belongsTo(ProgramSosial::class, );
    }
    public function pendidikans()
    {
        return $this->belongsTo(Pendidikan::class, );
    }
    /**
     * Get the user associated with the Relasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function keluargas(): HasOne
    {
        return $this->hasOne(Keluarga::class, 'keluarga_id', 'id');
    }
    /**
     * Get the user associated with the Relasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    /**
     * The roles that belong to the Relasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

}
