<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Followers
 *
 * @property int $id
 * @property int $who_follow
 * @property int $whom_follow
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|Followers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Followers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Followers query()
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereWhoFollow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereWhomFollow($value)
 * @mixin \Eloquent
 * @property int $subject_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereUpdatedAt($value)
 */
class Followers extends Model
{
    use HasFactory;

    protected $table = 'followers';
    protected $primaryKey = 'id';
}
