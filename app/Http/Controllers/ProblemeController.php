<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Forms\ProblemeForm;
use App\Partenaire;
use App\Personne;
use App\Probleme;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class ProblemeController extends Controller
{

    private $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    public function index()
    {
        return view('probleme.index');
    }

    public function create($type, $id)
    {
        $model = $type == 'personne' ? Personne::findOrFail($id) : Partenaire::findOrFail($id);
        $form = $this->getForm(null, 'create', $type, $model);
        return view('probleme.create', compact('form'));
    }

    public function store(Request $request, $type, $id)
    {
        $probleme = new Probleme();

        if ($type == 'personne')
            $probleme->personne()->associate(Personne::find($id));
        else
            $probleme->partenaire()->associate(Partenaire::find($id));

        $form = $this->getForm($probleme);
        $form->redirectIfNotValid();
        $probleme->categorie()->associate($request->get('categorie'));
        $probleme->type()->associate($request->get('type'));
        $probleme->accompagnement()->associate($request->get('accompagnement'));
        //dd($probleme);
        $probleme->save();
        if ($type == 'personne')
            return redirect(route('personne.show', ['personne' => $id]));
        if ($type == 'partenaire')
            return redirect(route('partenaire.show', ['partenaire' => $id]));
    }

    public function update(Request $request, $id)
    {
        $probleme = Probleme::findOrFail($id);
        if (!$probleme) {
            return response()->json(null, 404);
        }
        $probleme->categorie()->dissociate();
        $probleme->type()->dissociate();
        $probleme->accompagnement()->dissociate();
        $probleme->categorie()->associate(Configuration::find($request->get('categorie')));
        $probleme->type()->associate(Configuration::find($request->get('type')));
        $probleme->accompagnement()->associate(Configuration::find($request->get('accompagnement')));
        $probleme->dateProbleme = $request->get('dateProbleme');
        $probleme->save();
        return redirect(route('personne.show', ['id' => $probleme->personne]));
    }

    public function destroy($id)
    {
        $probleme = Probleme::find($id);
        if (!$probleme) {
            return response()->json(null, 404);
        }
        $probleme->delete();
        return redirect(route('personne.show', ['personne' => $probleme->personne]));
    }

    public function resoudre($id)
    {
        $probleme = Probleme::findOrFail($id);
        if (!$probleme) {
            return response()->json(null, 404);
        }
        $probleme->resolu = !$probleme->resolu;
        $probleme->save();
        return redirect(route('personne.show', ['personne' => $probleme->personne]));

    }


    public function modal($id, $action)
    {
        $probleme = Probleme::find($id);

        if ($action == "showModal") {
            return \response()->json(\view('probleme.ajax.show')->with(['probleme' => $probleme])->render());
        }
        if ($action == "editModal") {
            return \response()->json(\view('probleme.ajax.edit')->with(['probleme' => $probleme])->render());
        }
        if ($action == "deleteModal") {
            return \response()->json(\view('probleme.ajax.delete')->with(['probleme' => $probleme])->render());
        }
        return null;
    }

    private function getForm(?Probleme $probleme = null, $typeForm = 'create', $modelType = null, $id = null)
    {

        $model = $probleme ?: new Probleme();

        return $this->formBuilder->create(ProblemeForm::class,
            [
                'model' => $model,
                'data' => [
                    'typeForm' => $typeForm,
                    'type' => $modelType,
                    'id' => $id,
                ]
            ]);
    }
}
