<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArmyRequest as StoreRequest;
use App\Http\Requests\ArmyRequest as UpdateRequest;
use App\Models\Army;
use App\Models\Faction;
use Backpack\CRUD\app\Http\Controllers\CrudController;


class ArmyCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel(Army::class);
        $this->crud->setRoute('admin/army');
        $this->crud->setEntityNameStrings('army', 'armies');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setFromDb();


        // ------ CRUD FIELDS
        $this->crud->addField([
            'label'     => "Faction",
            'type'      => 'select2',
            'name'      => 'faction_id',
            'entity'    => 'faction',
            'attribute' => 'name',
            'model'     => Faction::class,
        ]);

        // ------ CRUD COLUMNS
        $this->crud->removeColumn('faction_id');
        $this->crud->addColumn([
            'label'     => 'Faction',
            'type'      => 'select',
            'name'      => 'faction_id',
            'entity'    => 'faction',
            'attribute' => 'name',
            'model'     => Faction::class,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $redirect_location = parent::storeCrud();
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud();
        return $redirect_location;
    }
}
