<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use hasFactory;

    protected $fillable = [
        'CategoryName'
];

    public function products(): HasMany {
        return $this->HasMany(Product::class, 'CategoryId');
    }

}
