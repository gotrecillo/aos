<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

/**
 * App\Models\Army
 *
 * @property int $id
 * @property string $name
 * @property int $faction_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Faction $faction
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Army whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Army whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Army whereFactionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Army whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Army whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Army extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    //protected $table = 'armys';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['name', 'faction_id'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }

    /*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
