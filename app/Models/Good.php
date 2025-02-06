<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'goods_code',
        'stock',
        'status'
    ];

    // A good can have many loans
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
