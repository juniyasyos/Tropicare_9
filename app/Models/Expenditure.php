<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;
    protected $primaryKey = 'ExpenditureID';


    protected $fillable = [
        'UserId',
        'ExpenditureDate',
        'Amount',
    ];

    protected $table = 'expenditures';
}
