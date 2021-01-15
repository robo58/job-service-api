<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'location'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function finishedJobs()
    {
        return $this->jobs()->where('finished', 1)->get();
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
