<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Questionnaire
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $criteria_name
 * @property string $priority
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereCriteriaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereUpdatedAt($value)
 * @property int $user_id
 * @property int $subject_id
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereUserId($value)
 */
class Questionnaire extends Model
{
    use HasFactory;

    protected $table = 'questionnaire';
    protected $primaryKey = 'id';
}
