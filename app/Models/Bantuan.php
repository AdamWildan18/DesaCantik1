<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bantuan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'bantuans';

    /**
     * Get the user that owns the Bantuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function keluargas(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id');
    }
}
