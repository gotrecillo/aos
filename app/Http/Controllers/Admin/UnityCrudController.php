<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UnityRequest as StoreRequest;
use App\Http\Requests\UnityRequest as UpdateRequest;
use App\Models\Unity;
use App\Models\Warscroll;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation

class UnityCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel(Unity::class);
        $this->crud->setRoute('admin/unity');
        $this->crud->setEntityNameStrings('unity', 'unities');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setFromDb();

        // CRUD Fields
        $this->crud->addField([
            'label'     => 'Warscroll',
            'type'      => 'select2',
            'name'      => 'warscroll_id',
            'entity'    => 'warscroll',
            'attribute' => 'name',
            'model'     => Warscroll::class,
        ])->afterField('name');

        $this->crud->addField([
            'name'  => 'wounds',
            'label' => 'Wounds',
            'type'  => 'number',
        ]);

        $this->crud->addField([
            'name'  => 'bravery',
            'label' => 'Bravery',
            'type'  => 'number',
        ]);

        $this->crud->addField([
            'name'  => 'move',
            'label' => 'Move',
            'type'  => 'number',
        ]);

        $this->crud->addField([
            'name'  => 'save',
            'label' => 'Save',
            'type'  => 'number',
        ]);


        $this->crud->addField([
            'name'            => 'melee',
            'label'           => 'Melee Weapons',
            'type'            => 'table',
            'entity_singular' => 'option',
            'columns'         => [
                'name'    => 'Name',
                'range'   => 'Range',
                'attacks' => 'Attacks',
                'hit'     => 'To Hit',
                'wound'   => 'To Wound',
                'rend'    => 'Rend',
                'damage'  => 'Damage',
            ],
        ]);

        $this->crud->addField([
            'name'            => 'missile',
            'label'           => 'Missile Weapons',
            'type'            => 'table',
            'entity_singular' => 'ability',
            'columns'         => [
                'name'    => 'Name',
                'range'   => 'Range',
                'attacks' => 'Attacks',
                'hit'     => 'To Hit',
                'wound'   => 'To Wound',
                'rend'    => 'Rend',
                'damage'  => 'Damage',
            ],
        ]);

        // ------ CRUD COLUMNS
        $this->crud->removeColumns(['melee', 'missile', 'warscroll_id']);

        $this->crud->addColumn([
            'label'     => 'Warscroll',
            'type'      => 'select',
            'name'      => 'warscroll_id',
            'entity'    => 'warscroll',
            'attribute' => 'name',
            'model'     => Warscroll::class,
        ])->beforeColumn('wounds');

        $this->crud->addColumn([
            'name'          => 'army',
            'label'         => 'Army',
            'type'          => 'model_function',
            'function_name' => 'getArmy',
        ])->afterColumn('name');

        $this->crud->enableDetailsRow();
    }

    public function showDetailsRow($id)
    {
        $unity = Unity::find($id);

        $details = view('unity.details')->withUnity($unity)->render();

        return $details;

    }

    public function store(StoreRequest $request)
    {
        //dd($request->all());
        // your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
