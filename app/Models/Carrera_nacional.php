<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera_nacional extends Model
{
    use HasFactory;
    protected $fillable = ['name','code','identificador'];
}
