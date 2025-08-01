<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'country_id',
        'education_level_id',
        'work_experience',
        'phone',
        'bio',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'work_experience' => 'integer',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'business_man_id');
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function favoriteJobs()
    {
        return $this->hasMany(FavoriteJob::class);
    }

    public function scopeJobSeekers($query)
    {
        return $query->where('role', 'job_seeker');
    }

    public function scopeBusinessMen($query)
    {
        return $query->where('role', 'business_man');
    }
}
