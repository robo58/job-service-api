<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'rating',
        'user_id',
        'reviewer_id'
    ];

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
