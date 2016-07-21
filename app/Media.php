<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Media
 *
 * @property integer $id
 * @property string $media
 * @property integer $contact_id
 * @method static \Illuminate\Database\Query\Builder|\App\Media whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Media whereMedia($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Media whereContactId($value)
 * @mixin \Eloquent
 */
class Media extends Model
{
    protected $table = 'media';

    protected $fillable = ['media', 'contact_id'];

    public $timestamps = false;
}
