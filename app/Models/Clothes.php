<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'color',
        'size',
        'brand',
        'price',
        'description',
        'image_url',
        'category',
        'gender'
    ];
}
