<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        'item',
        'unit_price',
        'quantity',
        'item_price',
        'client_name',
        'location',
        'client_email',
        'description',
        'slug',
      
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'item'
            ]
        ];
    }
}
