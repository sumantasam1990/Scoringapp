<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Faqscategory
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|Faqscategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faqscategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faqscategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faqscategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faqscategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faqscategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faqscategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faqscategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Faqscategory extends Model
{
    use HasFactory;
    protected $table = 'faqscategories';
    protected $primaryKey = 'id';
}
