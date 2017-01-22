<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WarscrollRequest as StoreRequest;
use App\Http\Requests\WarscrollRequest as UpdateRequest;
use App\Models\Army;
use App\Models\Warscroll;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation

class WarscrollCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel(Warscroll::class);
        $this->crud->setRoute('admin/warscroll');
        $this->crud->setEntityNameStrings('warscroll', 'warscrolls');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setFromDb();

        // ------ CRUD FIELDS
        $this->crud->addField([
            'label'     => 'Army',
            'type'      => 'select2',
            'name'      => 'army_id',
            'entity'    => 'army',
            'attribute' => 'name',
            'model'     => Army::class,
        ]);

        $this->crud->addField([
            'name'  => 'points',
            'label' => 'Points',
            'type'  => 'number',
        ]);

        $this->crud->addField([
            'name'  => 'min_size',
            'label' => 'Minimum size',
            'type'  => 'number',
        ]);

        $this->crud->addField([
            'name'  => 'max_size',
            'label' => 'Maximum size',
            'type'  => 'number',
        ]);


        $this->crud->addField([
            'name'            => 'options',
            'label'           => 'Options',
            'type'            => 'table',
            'entity_singular' => 'option',
            'columns'         => [
                'name' => 'Name',
                'desc' => 'Description',
            ],
        ]);

        $this->crud->addField([
            'name'            => 'abilities',
            'label'           => 'Abilities',
            'type'            => 'table',
            'entity_singular' => 'ability',
            'columns'         => [
                'name' => 'Name',
                'desc' => 'Description',
            ],
        ]);

        $this->crud->addField([
            'name'            => 'command_abilities',
            'label'           => 'Command Abilities',
            'type'            => 'table',
            'entity_singular' => 'ability',
            'columns'         => [
                'name' => 'Name',
                'desc' => 'Description',
            ],
        ]);

        // ------ CRUD COLUMNS
        $this->crud->removeColumns([
            'description',
            'abilities',
            'options',
            'command_abilities',
            'army_id',
            'min_size',
            'max_size',
        ]);

        $this->crud->addColumn([
            'label'     => 'Army',
            'type'      => 'select',
            'name'      => 'army_id',
            'entity'    => 'army',
            'attribute' => 'name',
            'model'     => Army::class,
        ])->afterColumn('name');

        $this->crud->addColumn([
            'label' => 'Min Size',
            'type'  => 'text',
            'name'  => 'min_size',
        ])->afterColumn('army_id');

        $this->crud->addColumn([
            'label' => 'Max Size',
            'type'  => 'text',
            'name'  => 'max_size',
        ])->afterColumn('min_size');

        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        //$this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {
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
