<?php

namespace App\Http\Controllers;

use App\Action;
use App\Configuration;
use App\Forms\ActionForm;
use App\Personne;
use App\Probleme;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class ActionController extends Controller
{
    private $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $personne = Personne::find($id);
        return view('action.create', ['problemes' => $personne->problemes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $probleme = Probleme::find($request->get('probleme'));
        $action = new Action();
        foreach ($request->except('probleme', 'action', 'complement') as $key => $value) {
            if (!in_array($key, array('_method', '_token')))
                $action->$key = $value;
        }
        $action->probleme()->associate($probleme);
        $action->action()->associate(Configuration::find($request->get('action')));
        $action->complement()->associate(Configuration::find($request->get('complement')));
        $action->save();
        return redirect(route('personne.show', ['personne' => $probleme->personne]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $action = Action::find($id);
        dd($action);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function modal($id, $action)
    {
        $model = Action::find($id);

        if ($action == "showModal") {
            return \response()->json(\view('action.ajax.show')->with(['action' => $model])->render());
        }
        if ($action == "editModal") {
            return \response()->json(\view('action.ajax.edit')->with(['action' => $model])->render());
        }
        if ($action == "deleteModal") {
            return \response()->json(\view('action.ajax.delete')->with(['action' => $model])->render());
        }
        return null;
    }

    private function getForm(?Action $action = null, $typeForm = 'create')
    {

        $model = $action ?: new Action();

        return $this->formBuilder->create(ActionForm::class,
            [
                'model' => $model,
                'data' => [
                    'typeForm' => $typeForm
                ]
            ]);
    }
}
