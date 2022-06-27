<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model; 

class Inventory extends Model 
{ 
    protected $fillable = [ 
        'brand',
        'name',
        'type', 
        'category', 
        'price', 
        'amount',      
    ]; 
}