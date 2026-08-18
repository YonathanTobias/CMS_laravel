<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'badge',
        'badge_color',
        'image',
        'cta_text',
        'cta_link',
        'secondary_text',
        'secondary_link',
        'order',
        'is_active',
    ];
}
