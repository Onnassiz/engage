<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ContactTags
 *
 * @property integer $id
 * @property integer $tag_id
 * @property integer $contact_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTags whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTags whereTagId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTags whereContactId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTags whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTags whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ContactTags extends Model
{
    protected $table = 'contacts_tags';

    protected $fillable = ['tag_id', 'contact_id'];
}
