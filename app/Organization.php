<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Organization
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $organization
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Organization whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organization whereOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organization whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organization whereUpdatedAt($value)
 */
class Organization extends Model
{
    protected $table = 'organizations';

    protected $fillable = ['organization', 'user_id'];

    public $timestamps = true;
}
