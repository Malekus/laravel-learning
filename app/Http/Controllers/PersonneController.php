<?php

namespace App\Http\Controllers;

use App\Action;
use App\CafDate;
use App\Configuration;
use App\Forms\PersonneForm;
use App\Forms\RoutineForm;
use App\Personne;
use App\Probleme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class PersonneController extends Controller
{

    private $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    public function index(Request $request)
    {

        if ($request->get('search') == null) {
            $personnes = Personne::index()->paginate(10);
            return view('personne.index', compact('personnes'));
        }

        $personnes = Personne::index()
            ->where('nom', 'like', '%' . $request->get('search') . '%')
            ->orWhere('matricule_caf', 'like', '%' . $request->get('search') . '%')
            //->get()
            ->paginate(10);
        return view('personne.index', compact('personnes'));

    }


    public function create()
    {
        $form = $this->getForm();
        return view('personne.create', compact('form'));
    }

    public function store(Request $request)
    {
        $personne = new Personne();
        $form = $this->getForm($personne);
        $form->redirectIfNotValid();
        $personne->logement()->associate($request->get('logement'));
        $personne->csp()->associate($request->get('csp'));
        $personne->categorie()->associate($request->get('categorie'));
        $form->getModel()->save();
        return redirect(route('personne.show', ['personne' => $personne]));
    }

    public function show($id)
    {
        $personne = Personne::find($id);
        $actions = Action::whereIn('probleme_id', $personne->problemes->pluck('id')->toArray())->get();
        return view('personne.show', compact(['personne', 'actions']));
    }

    public function edit(Personne $personne)
    {
        /*$personne = Personne::findOrFail($id);
        return view('personne.edit', compact('personne'));*/

        $form = $this->getForm($personne, 'edit');
        return view('personne.edit', compact('form'));

    }

    public function update(Request $request, $id)
    {
        $personne = Personne::find($id);
        if (!$personne) {
            return response()->json(null, 404);
        }

        foreach ($request->except('logement', 'csp', 'categorie') as $key => $value) {
            if (!in_array($key, array('_method', '_token')))
                $personne->$key = $value;
        }

        $personne->logement()->associate(Configuration::find($request->get('logement')));
        $personne->csp()->associate(Configuration::find($request->get('csp')));
        $personne->categorie()->associate(Configuration::find($request->get('categorie')));
        $personne->save();
        return redirect(route('personne.show', compact('personne')));
    }

    public function destroy($id)
    {
        $personne = Personne::find($id);
        if (!$personne) {
            return response()->json(null, 404);
        }
        $personne->delete();
        return redirect(route('personne.index'));
    }

    public function list_(Request $request)
    {
        $search = $request->get('search') ? $request->get('search') : null;
        if ($search === null) {
            $personnes = Personne::index()->paginate(10)->withPath('personne');
            return view('personne.ajax.list', compact('personnes'));
        }

        $personnes = Personne::index()
            ->where('nom', 'like', '%' . $search . '%')
            ->orWhere('matricule_caf', 'like', '%' . $search . '%')->paginate(10)->withPath('personne');

        return view('personne.ajax.list', compact('personnes'));
    }

    public function modal($id)
    {
        $personne = Personne::findOrFail($id);
        return \response()->json(\view('personne.ajax.delete')->with(['personne' => $personne])->render());
    }

    public function routine(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $form = $this->formBuilder->create(RoutineForm::class, ['model' => Personne::find($id)], ['id' => $id]);
            $form->redirectIfNotValid();
            //dd($form, $request->get('action'));
            $probleme = new Probleme();
            $probleme->categorie()->associate(Configuration::find($request->get('probleme')['categorie']));
            $probleme->type()->associate(Configuration::find($request->get('probleme')['type']));
            $probleme->accompagnement()->associate(Configuration::find($request->get('probleme')['accompagnement']));
            $probleme->dateProbleme = $request->get('probleme')['dateProbleme'];
            $probleme->personne()->associate(Personne::find($id));
            $probleme->save();
            foreach ($request->get('action') as $new){
                $action = new Action();
                foreach ($new as $key => $value) {
                    if (!in_array($key, ['action', 'complement']))
                        $action->$key = $value;
                }
                $action->probleme()->associate($probleme);
                $action->action()->associate(Configuration::find($new['action']));
                $action->complement()->associate(Configuration::find($new['complement']));
                $action->save();
            }
            return redirect(route('personne.show', ['personne' => $id]));
        }

        $form = $this->formBuilder->create(RoutineForm::class, [], ['id' => $id]);

        return view('personne.routine', compact('form'));

    }

    public function createCafDate(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            return view('caf.create', ['personne' => Personne::findOrFail($id)]);
        }

        if ($request->isMethod('post')) {
            $cafDate = new CafDate();
            $cafDate->dateCaf = $request->get('dateCaf');
            $cafDate->motif()->associate(Configuration::find($request->get('motif')));
            $cafDate->personne()->associate(Personne::find($id));
            $cafDate->save();
            return redirect(route('personne.show', ['personne' => $id]));
        }
        return abort(404);

    }

    public function addListCafDate($id)
    {
        $caf = CafDate::where(['personne_id' => $id, 'dateCaf' => Carbon::now()->format('Y-m-d')])->get();
        if (count($caf) != 0) {
            foreach ($caf as $c)
                $c->delete();
            return redirect(route('personne.show', ['personne' => $id]));
        }
        $cafDate = new CafDate();
        $cafDate->dateCaf = Carbon::now();
        $cafDate->personne()->associate(Personne::find($id));
        $cafDate->save();
        return redirect(route('personne.show', ['personne' => $id]));

    }


    private function getForm(?Personne $personne = null, $type = 'create')
    {

        $model = $personne ?: new Personne();
        return $this->formBuilder->create(PersonneForm::class,
            [
                'model' => $model,
                'data' => [
                    'type' => $type
                ],
                'novalidate'
            ]);
    }
}
