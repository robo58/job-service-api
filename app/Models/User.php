<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'github',
        'facebook',
        'linkedin',
        'instagram',
        'location',
        'api_token',
        'is_recruiter',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function generateToken()
    {
        $this->api_token = Str::random(60);
        $this->save();

        return $this->api_token;
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function userReviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
    public function recruiterReviews()
    {
        return $this->hasMany(Review::class, 'reviewer_id');
    }
    public function userJobs()
    {
        return $this->hasMany(Job::class, 'employee_id');
    }
    public function recruiterJobs()
    {
        return $this->hasMany(Job::class, 'recruiter_id');
    }

    public function applications()
    {
        return $this->belongsToMany(Job::class, 'applications', 'job_id', 'user_id');
    }

    public function activeJobs()
    {
        return $this->jobs()->where('in_progress', 1)->get();
    }
    public function finishedJobs()
    {
        return $this->jobs()->where('finished', 1)->get();
    }
}
