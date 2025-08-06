<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Song extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'file_path',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(SongCategory::class);
    }
}
