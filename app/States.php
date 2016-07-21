<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\States
 *
 * @property integer $id
 * @property string $state
 * @method static \Illuminate\Database\Query\Builder|\App\States whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\States whereState($value)
 * @mixin \Eloquent
 */
class States extends Model
{
    protected $table = 'states';
}
