<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ContactTemp
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property string $firstname
 * @property string $surname
 * @property string $state_of_origin
 * @property string $sex
 * @property string $organization
 * @property string $function
 * @property string $current_city
 * @property string $current_state
 * @property string $email_1
 * @property string $email_2
 * @property string $telephone_1
 * @property string $telephone_2
 * @property string $periodicity
 * @property string $media
 * @property string $tags
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereSurname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereStateOfOrigin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereSex($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereFunction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereCurrentCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereCurrentState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereEmail1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereEmail2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereTelephone1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereTelephone2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp wherePeriodicity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereMedia($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereTags($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereUpdatedAt($value)
 * @property integer $number
 * @method static \Illuminate\Database\Query\Builder|\App\ContactTemp whereNumber($value)
 */
class ContactTemp extends Model
{
    protected $table = 'contacts_temp';

    protected $fillable = [
        'number',
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
