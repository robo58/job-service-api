<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'employee_id',
        'recruiter_id',
        'in_progress',
        'finished'
    ];

    public static $relationships = [
        'employee_id' => [User::class, 'email'],
        'recruiter_id' => [User::class, 'email'],
        'skills' => [Skill::class, 'name']
    ];

    public static $keys = [
        'title'=> 'title',
        'description'=> 'description',
        'employee email'=>'employee_id',
        'recruiter email'=>'recruiter_id',
        'in progress'=>'in_progress',
        'skill'=>'skills',
        'finished'=>'finished'
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_job', 'job_id', 'skill_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }

    public function applications()
    {
        return $this->belongsToMany(User::class, 'applications', 'user_id', 'job_id');
    }
}
