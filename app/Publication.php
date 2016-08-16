<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Publication
 *
 * @property integer $id
 * @property string $title
 * @property string $publication
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication wherePublication($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Publication extends Model
{
    protected $table = 'publications';

    protected $fillable = [
        'title',
        'publication',
        'user_id'
    ];
}
