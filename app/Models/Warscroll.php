<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Warscroll
 *
 * @property int $id
 * @property string $name
 * @property int $army_id
 * @property int $min_size
 * @property int $max_size
 * @property int $points
 * @property string $description
 * @property string $options
 * @property string $abilities
 * @property string $command_abilities
 * @property string $notes
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Army $army
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereArmyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereMinSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereMaxSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll wherePoints($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereOptions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereAbilities($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereCommandAbilities($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereNotes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warscroll whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Warscroll extends Model
{

    use CrudTrait;

    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

    // protected $table = 'warscrolls';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
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
    public function army()
    {
        return $this->belongsTo(Army::class);
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
