<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Score
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $subject_id
 * @property int|null $applicant_id
 * @property int|null $criteria_id
 * @property int|null $score_number
 * @property string|null $notes
 * @property string|null $score_files
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Applicant|null $applicant
 * @property-read \App\Models\Criteria|null $criteria
 * @property-read \App\Models\Subject|null $subject
 * @method static \Illuminate\Database\Eloquent\Builder|Score newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Score newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Score query()
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereApplicantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereCriteriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereScoreFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereScoreNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $score_card_no score_number - minimum score
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereScoreCardNo($value)
 * @property-read \App\Models\User $user
 */
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

    public function user() {
        return $this->belongsTo(User::class);
    }


}
