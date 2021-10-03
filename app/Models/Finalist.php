<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finalist extends Model
{
    use HasFactory;

    protected $table = 'finalists';
    protected $primaryKey = 'id';
}
