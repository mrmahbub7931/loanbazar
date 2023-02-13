<?php

namespace App\Models;

use App\Models\DealBody;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BestDeal extends Model
{
    use HasFactory;

    protected $table = 'best_deals';

    protected $guarded = ['id'];

    public function getDealsBody()
    {
        return $this->hasMany(DealBody::class,'best_deal_id');
    }


}
