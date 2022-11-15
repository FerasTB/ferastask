<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSupport extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'problem', 'category', 'priority', 'agent', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ticket_id');
    }
}
