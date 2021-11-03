<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function subscriptions()
    {
        return $this->hasMany(Subscriber::class, 'topic_id');
    }

    public function publishes()
    {
        return $this->hasMany(Publish::class, 'topic_id');
    }

    protected $with = ['subscriptions'];

    protected $fillable = [
        'topic_name'
    ];
}
