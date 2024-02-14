<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'current_position',
        'industry',
        'address',
        'contact_information',
        'about',
        'title',
        'is_archived',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function curriculumVitae()
    {
        return $this->hasOne(CurriculumVitae::class);
    }
    public function applications()
{
    return $this->hasMany(Application::class);
}
}
