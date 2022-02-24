<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function card_check()
    {
        return $this->hasOne(Register::class, 'card_number', 'card_number');
    }

    public function card()
    {
        return $this->hasOne(Card::class, 'card_id');
    }
}
