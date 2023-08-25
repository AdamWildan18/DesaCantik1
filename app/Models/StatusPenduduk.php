<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPenduduk extends Model
{
    use HasFactory;
    public $table = "status_penduduk";
    protected $guarded = ['id'];

    public function penduduk()
    {
        return $this->hasMany(penduduk::class);
    }

    public function getRouteKeyName()
    {
        return 'nik';
    }
}
