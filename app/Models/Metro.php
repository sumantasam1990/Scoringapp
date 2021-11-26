<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Metro
 *
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Metro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Metro extends Model
{
    use HasFactory;

    protected $table = 'metro';
    protected $primaryKey = 'id';
}
