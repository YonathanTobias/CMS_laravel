<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'degree',
        'accreditation',
        'accreditation_certificate',
        'description',
        'curriculum_summary',
        'career_prospects',
        'image',
        'icon',
        'is_active',
    ];
}
