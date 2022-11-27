<?php

namespace App\Models;

use App\Models\CardService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardServiceRow extends Model
{
    use HasFactory;

    protected $fillable = ['card_service_id','card_image','notify_top','ineterest_period','annual_fee','card_processing','free_supplementary_card','withdrawl_limit','fees_charges', 'features', 'eligibility', 'notify_bottom','status'];

    public function getCardService()
    {
        return $this->belongsTo(CardService::class, 'card_service_id');
    }
}
