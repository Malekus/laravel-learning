<?php

namespace App\Http\Controllers;

use App\Action;
use App\Configuration;
use App\Personne;
use App\Probleme;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonneController extends Controller
{
    public function index(Request $request)
    {

        if($request->get('search') == null){
            $personnes = Personne::index()->paginate(10);
            return view('personne.index', compact('personnes'));
        }

        $personnes = Personne::index()
            ->where('nom', 'like', '%'.$request->get('search').'%')
            ->orWhere('matricule_caf', 'like', '%'.$request->get('search').'%')
            //->get()
            ->paginate(10);
        return view('personne.index', compact('personnes'));

    }


    public function create(){
        return view('personne.create');
    }

    public function store(Request $request)
    {
        $personne = Personne::create($request->except('logement', 'csp', 'categorie'));
        $personne->logement()->associate(Configuration::find($request->get('logement')));
        $personne->csp()->associate(Configuration::find($request->get('csp')));
        $personne->categorie()->associate(Configuration::find($request->get('categorie')));
        $personne->save();
        return redirect(route('personne.show', ['personne' => $personne]));
    }

    public function show($id)
    {
        $personne = Personne::find($id);
        $actions = Action::whereIn('probleme_id', $personne->problemes->pluck('id')->toArray())->get();
        return view('personne.show', compact(['personne', 'actions']));
    }

    public function edit($id){
        $personne = Personne::findOrFail($id);
        return view('personne.edit', compact('personne'));
    }

    public function update(Request $request, $id)
    {
        $personne = Personne::find($id);
        if(!$personne){
            return response()->json(null, 404);
        }

        foreach ($request->except('logement', 'csp', 'categorie') as $key => $value){
            if(!in_array($key, array('_method', '_token')))
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
        if(!$personne){
            return response()->json(null, 404);
        }
        $personne->delete();
        return redirect(route('personne.index'));
    }

    public function list_(Request $request){
        $search = $request->get('search') ? $request->get('search') : null;
        if($search === null){
            $personnes = Personne::index()->paginate(10)->withPath('personne');
            return view('personne.ajax.list', compact('personnes'));
        }

        $personnes = Personne::index()
            ->where('nom', 'like', '%'.$search.'%')
            ->orWhere('matricule_caf', 'like', '%'.$search.'%')->paginate(10)->withPath('personne');

        return view('personne.ajax.list', compact('personnes'));
    }

    public function modal($id){
        $personne = Personne::findOrFail($id);
        return \response()->json(\view('personne.ajax.delete')->with(['personne' => $personne])->render());
    }

    public function routine($id){

    }

    public function cafMois($id)
    {
        return view('caf.create');
    }
}
