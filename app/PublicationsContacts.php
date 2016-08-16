<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PublicationsContacts
 *
 * @property integer $id
 * @property integer $contact_id
 * @property integer $publication_id
 * @method static \Illuminate\Database\Query\Builder|\App\PublicationsContacts whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PublicationsContacts whereContactId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PublicationsContacts wherePublicationId($value)
 * @mixin \Eloquent
 */
class PublicationsContacts extends Model
{
    protected $table = 'publication_contact_list';

    protected $fillable = [
        'contact_id',
        'publication_id'
    ];

    public $timestamps = false;
}
