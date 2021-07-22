<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{   //mention the table 
    protected $table='data';
    //no need for timestamps
    public $timestamps = false;
    //specify primary key;
    protected $primaryKey = 'id';
}
