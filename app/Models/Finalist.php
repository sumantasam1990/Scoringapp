<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Finalist
 *
 * @property int $id
 * @property int|null $subject_id
 * @property int|null $applicant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Finalist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Finalist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Finalist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Finalist whereApplicantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Finalist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Finalist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Finalist whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Finalist whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Finalist extends Model
{
    use HasFactory;

    protected $table = 'finalists';
    protected $primaryKey = 'id';
}
