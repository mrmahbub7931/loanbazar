<?php

namespace App\Models;

use App\Models\LoanService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanServiceRow extends Model
{
    use HasFactory;

    protected $table = 'loan_service_rows';
    // protected $fillable = ['loan_service_id','bank_logo','notify_top','bank_name','ineterest_rate_range','processing_fee','loan_amount','loan_tenure','fees_charges', 'features', 'eligibility', 'notify_bottom','status'];
    protected $guarded = ['id'];
    
    public function getCardService()
    {
        return $this->belongsTo(LoanService::class, 'loan_service_id');
    }
}
