<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $subject_id
 * @property int $user_id
 * @property string|null $message_txt
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessageTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUserId($value)
 * @property int $room_id
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereRoomId($value)
 */
class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id';

}
