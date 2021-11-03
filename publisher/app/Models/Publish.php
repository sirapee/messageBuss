<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    use HasFactory;

    protected $table = 'publish';

    protected $fillable = [
        'topic_id',
        'published_data'
    ];
}
