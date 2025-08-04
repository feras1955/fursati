<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'work_place',
        'gender_preference',
        'education_level_id',
        'work_experience',
        'work_field_id',
        'country_of_graduation',
        'country_of_residence',
        'business_man_id',
        'description',
        'requirements',
        'salary_min',
        'salary_max',
        'salary_range',
        'job_type',
        'skills',
        'status',
    ];

    protected $casts = [
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function businessMan()
    {
        return $this->belongsTo(User::class, 'business_man_id');
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function workField()
    {
        return $this->belongsTo(WorkField::class);
    }

    public function countryOfGraduation()
    {
        return $this->belongsTo(Country::class, 'country_of_graduation');
    }

    public function countryOfResidence()
    {
        return $this->belongsTo(Country::class, 'country_of_residence');
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function favorites()
    {
        return $this->hasMany(FavoriteJob::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
} 