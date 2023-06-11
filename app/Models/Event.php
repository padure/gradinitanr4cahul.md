<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    public const LAST = 3;

    protected $fillable = [
        'title',
        'description',
        'image',
        'body',
        'autor',
        'event_category_id',
    ];
    
    public function eventCategory(): BelongsTo
    {
        return $this->belongsTo(EventCategory::class);
    }
}
