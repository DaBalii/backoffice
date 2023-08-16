<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homes extends Model
{
    use HasFactory;

    protected $table ='homes';
    protected $fillable =['item_code','price','localisation',
        'description','bathrooms','area','model',
        'path','category','quartier','position'];

}
