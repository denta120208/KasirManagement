<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'table_id', 'total', 'discount', 'paid', 'payment_method', 'receipt_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ...tambahkan relasi lain jika perlu...
}
