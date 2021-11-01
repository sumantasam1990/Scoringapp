<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Subject
 *
 * @property int $id
 * @property int $user_id
 * @property string $subject_name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Applicant[] $applicant
 * @property-read int|null $applicant_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Criteria[] $criteria
 * @property-read int|null $criteria_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Score[] $score
 * @property-read int|null $score_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Subject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereSubjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereUserId($value)
 * @mixin \Eloquent
 * @property int $mainsubject_id
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereMainsubjectId($value)
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereStatus($value)
 */
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

    public function maincriteria() {
        return $this->hasMany(Maincriteria::class);
    }

    public function score() {
        return $this->hasMany(Score::class);
    }

    public function team() {
        return $this->hasMany(Team::class, 'user_email', 'id');
    }
}
