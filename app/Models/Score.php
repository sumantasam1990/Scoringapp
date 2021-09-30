<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $table = 'scores';
    protected $primaryKey = 'id';

    // Relationships
    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function criteria() {
        return $this->belongsTo(Criteria::class);
    }

    public function applicant() {
        return $this->belongsTo(Applicant::class);
    }


}
