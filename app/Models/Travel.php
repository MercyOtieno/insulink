<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = [
        'travel_duration_from',
        'travel_duration_to',
        'names',
        'travellers',
        'cellphone',
        'destination',
        'purpose',
        'age',
        'email',
    ];
    use HasFactory;
    CONST PENDINGQUOTES = 'pending quotations';
    CONST PENDING = 'pending response';
}
