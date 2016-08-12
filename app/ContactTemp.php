<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ContactTemp
 *
 * @mixin \Eloquent
 */
class ContactTemp extends Model
{
    protected $table = 'contacts_temp';

    protected $fillable = [
        'user_id',
        'firstname',
        'surname',
        'state_of_origin',
        'sex',
        'organization',
        'function',
        'current_city',
        'current_state',
        'email_1',
        'email_2',
        'telephone_1',
        'telephone_2',
        'periodicity',
        'media',
        'tags',
    ];

    public $timestamps = true;
}
