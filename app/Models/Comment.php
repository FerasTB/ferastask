<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'user_id'];
    public function tickets()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
