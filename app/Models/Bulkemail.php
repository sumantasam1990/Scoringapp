<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bulkemail
 *
 * @property int $id
 * @property int|null $subject_id
 * @property int|null $applicant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Bulkemail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bulkemail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bulkemail query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bulkemail whereApplicantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulkemail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulkemail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulkemail whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bulkemail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bulkemail extends Model
{
    use HasFactory;
    protected $table = 'bulkemails';
    protected $primaryKey = 'id';

}
