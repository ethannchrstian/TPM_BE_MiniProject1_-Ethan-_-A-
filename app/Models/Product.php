<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use hasFactory;

    protected $fillable = [
        "ProductName",
        "ProductPrice",
        "ProductImage",
        "CategoryId"
    ];
    
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class, 'CategoryId');
    }
    }

