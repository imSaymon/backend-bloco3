<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    protected $appends = ['price_float'];

    // protected $with = ['categories'];

    // protected $casts = [
    //     'created_at' => 'date:d/m'
    // ];

    public function priceFloat(): Attribute
    {
        return new Attribute(
            get: fn($price) => $this->attributes['price'] / 100
        );
    }

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('d/m/Y H:i');
    // }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
