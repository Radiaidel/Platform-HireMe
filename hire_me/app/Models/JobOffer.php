<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobOffer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'description',
        'skills_required',
        'contract_type',
        'location',
        'company_id',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
