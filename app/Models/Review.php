<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
