<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
    use HasFactory;
    protected $fillable = [ 'job_seeker_id','skills', 'experiences', 'education', 'languages'];

    protected $casts = [
        'skills' => 'json',
        'experiences' => 'json',
        'education' => 'json',
        'languages' => 'json',
    ];
}
