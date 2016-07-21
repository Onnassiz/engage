<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ContactOrganization
 *
 * @property integer $id
 * @property integer $organization_id
 * @property integer $contact_id
 * @method static \Illuminate\Database\Query\Builder|\App\ContactOrganization whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactOrganization whereOrganizationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactOrganization whereContactId($value)
 * @mixin \Eloquent
 */
class ContactOrganization extends Model
{
    protected $table = 'contact_organizations';

    protected $fillable = ['organization_id', 'contact_id'];

    public $timestamps = false;
}
