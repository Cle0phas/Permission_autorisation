<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User;

class LastLogin extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
