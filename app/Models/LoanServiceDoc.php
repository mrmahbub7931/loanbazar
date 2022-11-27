<?php

namespace App\Models;

use App\Models\LoanService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanServiceDoc extends Model
{
    use HasFactory;

    protected $fillable = ['loan_service_id','title','body','status'];

    public function getLoanService()
    {
        return $this->belongsTo(LoanService::class, 'loan_service_id');
    }
}
