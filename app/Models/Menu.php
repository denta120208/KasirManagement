<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // tambahkan field lain jika perlu
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
