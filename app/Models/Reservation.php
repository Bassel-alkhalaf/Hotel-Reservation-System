<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_number',
        'check_in_date',
        'check_out_date',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
