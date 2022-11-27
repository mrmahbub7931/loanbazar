<?php

namespace App\Models;

use App\Models\BestDeal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DealBody extends Model
{
    use HasFactory;

    protected $fillable = ['best_deal_id','body'];

    public function getBestDeal()
    {
        return $this->belongsTo(BestDeal::class, 'best_deal_id');
    }
}
