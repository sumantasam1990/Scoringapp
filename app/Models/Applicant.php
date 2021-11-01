<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Applicant
 *
 * @property int $id
 * @property int $subject_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Score[] $score
 * @property-read int|null $score_count
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';
    protected $primaryKey = 'id';

    // Relationships

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function score() {
        return $this->hasMany(Score::class);
    }
}
