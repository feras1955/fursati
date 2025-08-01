<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function jobsGraduation()
    {
        return $this->hasMany(Job::class, 'country_of_graduation');
    }

    public function jobsResidence()
    {
        return $this->hasMany(Job::class, 'country_of_residence');
    }
} 