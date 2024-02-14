<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = ['job_seeker_id', 'job_offer_id'];
    
    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }
}
