<?php

namespace App\Models;

use App\Traits\UuidIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, UuidIndex;

    public function checkout(){
        return $this->belongsTo(Checkout::class);
    }

    public function method(){
        return $this->belongsTo(PaymentMethod::class,'method_id');
    }

}
