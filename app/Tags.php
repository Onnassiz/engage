<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tags
 *
 * @property integer $id
 * @property string $tags
 * @property integer $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Tags whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tags whereTags($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tags whereUserId($value)
 * @mixin \Eloquent
 */
class Tags extends Model
{
    protected $table = 'tags';

    protected $fillable = ['tags', 'user_id'];

    public $timestamps = false;
}
