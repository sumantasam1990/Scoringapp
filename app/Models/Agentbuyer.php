<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agentbuyer
 *
 * @property int $id
 * @property int $agent_id
 * @property string $buyer_email
 * @property int $subject_id
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer whereBuyerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agentbuyer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Agentbuyer extends Model
{
    use HasFactory;

    protected $table = 'agentbuyers';
    protected $primaryKey = 'id';
}
