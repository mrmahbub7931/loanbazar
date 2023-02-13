<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurancePost extends Model
{
    use HasFactory;

    protected $table = 'insurance_posts';
    
    // protected $fillable = ['insurance_id','title','url','description','pdf_file','featured_image','status'];
    protected $guarded = ['id'];
    
    public function getInsurancePostParent()
    {
        return $this->belongsTo(Insurance::class,'insurance_id');
    }
}
