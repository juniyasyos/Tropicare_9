<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'TransactionID';

    protected $fillable = [
        'UserId',
        'TransactionDate',
        'Quantity',
        'PricePerKg',
    ];

    protected $table = 'transactions';
}
