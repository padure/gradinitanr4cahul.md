<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Law extends Model
{
    use HasFactory;

    public const LAST = 0;

    protected $fillable = [
        'nume',
        'section_id',
        'file',
    ];
    
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
