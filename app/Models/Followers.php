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
 */
class Followers extends Model
{
    use HasFactory;

    protected $table = 'followers';
    protected $primaryKey = 'id';
}
