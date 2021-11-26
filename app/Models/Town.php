<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Town
 *
 * @property int $id
 * @property int $metro_id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Town newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Town newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Town query()
 * @method static \Illuminate\Database\Eloquent\Builder|Town whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Town whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Town whereMetroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Town whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Town whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Town extends Model
{
    use HasFactory;

    protected $table = 'town';
    protected $primaryKey = 'id';
}
