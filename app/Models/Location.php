<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Location
 *
 * @property int $id
 * @property int|null $town_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereTownId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUserId($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';
    protected $primaryKey = 'id';
}
