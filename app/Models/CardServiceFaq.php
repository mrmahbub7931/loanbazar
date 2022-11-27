<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardServiceFaq extends Model
{
    use HasFactory;

    protected $fillable = ['card_service_id','faqs'];

    public function getCardService()
    {
        return $this->belongsTo(CardService::class, 'card_service_id');
    }
}
