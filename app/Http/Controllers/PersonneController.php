<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Http\Request;
use \App\Http\Resources\Personne as PersonneResource;

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
        $personne = Personne::create($request->all());
        //return response()->json(new PersonneResource($personne), 201, [], JSON_NUMERIC_CHECK);
        return redirect(route('personne.index'));
    }

    public function show($id)
    {
        /*
        $personne = Personne::find($id);
        if(!$personne){
            return response()->json(null, 404);
        }
        return response()->json(new PersonneResource($personne), 200, [], JSON_NUMERIC_CHECK);
        */
        $personne = Personne::findOrFail($id);
        return view('personne.show', compact('personne'));
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
        $personne->update($request->all());
        return redirect(route('personne.index'));
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

    public function routine($id){

    }
}
