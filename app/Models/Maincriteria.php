<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Maincriteria
 *
 * @property int $id
 * @property string $criteria_name
 * @method static \Illuminate\Database\Eloquent\Builder|Maincriteria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Maincriteria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Maincriteria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Maincriteria whereCriteriaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincriteria whereId($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property int $subject_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Maincriteria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincriteria whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincriteria whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincriteria whereUserId($value)
 */
class Maincriteria extends Model
{
    use HasFactory;

    protected $table = 'maincriterias';
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
