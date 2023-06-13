<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_1',
        'user_2'
    ];

    public function user_1()
    {
        return $this->hasOne(User::class, 'id', 'user_1');
    }

    public function user_2()
    {
        return $this->hasOne(User::class, 'id', 'user_2');
    }

    public function messages()
{
    return $this->hasMany(Message::class);
}
}
