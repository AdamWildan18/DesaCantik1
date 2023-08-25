<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    public $table = "program";
    protected $guarded = ['id'];
    // protected $keyType = 'string';
    // public $timestamps = false;

    /**
     * Get the user that owns the Program
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function keluargas(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id' );
    }
}
