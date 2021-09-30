<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criterias';
    protected $primaryKey = 'id';

    // Relationships
    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function score() {
        return $this->hasMany(Score::class);
    }

}
