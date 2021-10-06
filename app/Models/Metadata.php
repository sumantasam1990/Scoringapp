<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Metadata
 *
 * @property int $id
 * @property int|null $score_id
 * @property string|null $meta_notes
 * @property string|null $meta_file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata query()
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereMetaFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereMetaNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereScoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Metadata extends Model
{
    use HasFactory;

    protected $table = 'metadatas';
    protected $primaryKey = 'id';
}
