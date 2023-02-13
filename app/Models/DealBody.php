<?php

namespace App\Models;

use App\Models\BestDeal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DealBody extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getBestDeal()
    {
        return $this->belongsTo(BestDeal::class, 'best_deal_id');
    }
}
