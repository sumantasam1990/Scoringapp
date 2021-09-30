<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $primaryKey = 'id';


    // Relationships
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function applicant() {
        return $this->hasMany(Applicant::class);
    }

    public function criteria() {
        return $this->hasMany(Criteria::class);
    }

    public function score() {
        return $this->hasMany(Score::class);
    }
}
