<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public $table = "keluargas";
    protected $guarded = ['id'];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
