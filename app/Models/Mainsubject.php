<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mainsubject
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Mainsubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mainsubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mainsubject query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $main_subject_name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Mainsubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainsubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainsubject whereMainSubjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainsubject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainsubject whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $team
 * @property-read int|null $team_count
 * @property-read \App\Models\User $user
 */
class Mainsubject extends Model
{
    use HasFactory;

    protected $table = 'mainsubjects';
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function team() {
        return $this->hasMany(Team::class, 'user_email', 'id');
    }
}
