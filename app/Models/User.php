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
    public function recruiter()
    {
        return $this->hasOne(Recruiter::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function jobs()
    {
        return $this->hasMany(Job::class);
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
