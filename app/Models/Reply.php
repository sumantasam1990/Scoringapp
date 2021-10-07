<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Reply
 *
 * @property int $id
 * @property int $subject_id
 * @property int $message_id
 * @property string $reply_txt
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereReplyTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reply extends Model
{
    use HasFactory;
    protected $table = 'replies';
    protected $primaryKey = 'id';

}
