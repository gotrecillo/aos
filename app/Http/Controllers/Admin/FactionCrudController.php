<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FactionRequest as StoreRequest;
use App\Http\Requests\FactionRequest as UpdateRequest;
use App\Models\Faction;
use Backpack\CRUD\app\Http\Controllers\CrudController;


class FactionCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel(Faction::class);
        $this->crud->setRoute('admin/faction');
        $this->crud->setEntityNameStrings('faction', 'factions');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setFromDb();

        $this->crud->addField([
            'label' => 'Faction Image',
            'name' => 'image',
            'type' => 'browse',
        ]);

        $this->crud->enableDetailsRow();

    }

    public function showDetailsRow($id)
    {
        $faction = Faction::find($id);

        $src = $faction->image;

        return "<img src='/$src' class='center-block img-responsive'>";
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
