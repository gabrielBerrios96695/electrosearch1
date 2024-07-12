<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Product extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'user_id', // Ensure this line is present
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

