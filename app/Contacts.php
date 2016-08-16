<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contacts
 *
 * @property integer $id
 * @property string $key
 * @property integer $user_id
 * @property string $firstname
 * @property string $surname
 * @property string $state_of_origin
 * @property string $sex
 * @property string $organization
 * @property string $rank
 * @property string $current_city
 * @property string $current_state
 * @property string $email_1
 * @property string $email_2
 * @property string $telephone_1
 * @property string $telephone_2
 * @property string $periodicity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereKey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereSurname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereStateOfOrigin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereSex($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereRank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereCurrentCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereCurrentState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereEmail1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereEmail2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereTelephone1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereTelephone2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts wherePeriodicity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $filter
 * @method static \Illuminate\Database\Query\Builder|\App\Contacts whereFilter($value)
 */
class Contacts extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'key',
        'number',
        'user_id',
        'filter',
        'firstname',
        'surname',
        'state_of_origin',
        'sex',
        'organization',
        'rank',
        'current_city',
        'current_state',
        'email_1',
        'email_2',
        'telephone_1',
        'telephone_2',
        'periodicity'
    ];

   public $timestamps = true;
}
