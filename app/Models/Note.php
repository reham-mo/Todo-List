<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'notes';
    protected $timestapms = true;
    protected $dateformate = 'h:m:s'; 
    protected $cast = [
        'time' => 'array'
    ];
    protected $fillable = ['title', 'description','time', 'image_path', 'user_id'];
 
  
}
