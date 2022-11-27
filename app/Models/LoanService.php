<?php

namespace App\Models;

use App\Models\LoanServiceFaq;
use App\Models\LoanServiceRow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanService extends Model
{
    use HasFactory;

    protected $table = 'loan_services';
    protected $fillable = ['user_id', 'service_title', 'title_description', 'disclaimer', 'header_image'];

    public function getServiceRows()
    {
        return $this->hasMany(LoanServiceRow::class,'loan_service_id');
    }

    public function getServiceFaqs()
    {
        return $this->hasMany(LoanServiceFaq::class,'loan_service_id');
    }

    public function getServiceDocs()
    {
        return $this->hasMany(LoanServiceDoc::class,'loan_service_id');
    }
}
