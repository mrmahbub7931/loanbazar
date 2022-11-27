<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangneRate extends Model
{
    use HasFactory;

    // protected $fillable = ['date','currency','buying','selling'];
    protected $guarded = [];
    protected $table = 'exchangne_rates';

    
}
