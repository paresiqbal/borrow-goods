<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'good_id',
        'borrow_date',
        'return_date',
        'loan_status'
    ];

    public function borrower()
    {
        return $this->belongsTo(\App\Models\User::class, 'borrower_id');
    }

    public function good()
    {
        return $this->belongsTo(Good::class);
    }
}
