<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Unity
 *
 * @property int $id
 * @property string $name
 * @property int $wounds
 * @property int $bravery
 * @property int $move
 * @property int $save
 * @property string $melee
 * @property string $missile
 * @property int $warscroll_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Warscroll $warscroll
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereWounds($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereBravery($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereMove($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereSave($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereMelee($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereMissile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereWarscrollId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Unity extends Model
{

    use CrudTrait;

    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

    protected $table = 'unities';
    //protected $primaryKey = 'id';
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
    public function getArmy()
    {
        return $this->warscroll ? $this->warscroll->army->name : '';
    }

    /*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
    public function warscroll()
    {
        return $this->belongsTo(Warscroll::class);
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
