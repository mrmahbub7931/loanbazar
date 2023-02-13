<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $table = 'insurances';
    
    // protected $fillable = ['title','url','description','header_image','status'];
    protected $guarded = ['id'];
    
    public function getInsurancePosts()
    {
        return $this->hasMany(InsurancePost::class, 'insurance_id');
    }
}
