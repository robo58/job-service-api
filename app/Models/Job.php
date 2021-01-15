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

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function employee()
    {
        return $this->belongsTo(User::class);
    }
    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }
}
