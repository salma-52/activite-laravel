<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'RefPdt', // Replace with an actual reference number
        'libPdt', // Replace with the product name
        'prix',
        'Qte' , 
        'description',
        'image' , 
        'type', 
    ];
}
