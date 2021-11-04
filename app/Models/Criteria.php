<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Criteria
 *
 * @property int $id
 * @property int $maincriteria_id
 * @property int|null $subject_id
 * @property string|null $title
 * @property string|null $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Score[] $score
 * @property-read int|null $score_count
 * @property-read \App\Models\Subject|null $subject
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria whereMaincriteriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $note
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria whereNote($value)
 * @property int $applicant_id
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria whereApplicantId($value)
 * @property string|null $photo
 * @property-read \App\Models\Maincriteria $maincriteria
 * @method static \Illuminate\Database\Eloquent\Builder|Criteria wherePhoto($value)
 */
class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criterias';
    protected $primaryKey = 'id';

    // Relationships
    /**
     * @var string|null
     */
    private $photo;

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function score() {
        return $this->hasMany(Score::class);
    }

    public function maincriteria() {
        return $this->belongsTo(Maincriteria::class);
    }

}
