<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpmiDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'document_number',
        'category',
        'file_path',
        'year',
    ];
}
