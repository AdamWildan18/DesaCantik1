<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\Table;

class asset extends Model
{
    public $table = "aset";
    public $timestamps = false;

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'asset_id');
    }
}
