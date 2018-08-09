<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Http\Request;
use \App\Http\Resources\Personne as PersonneResource;

class PersonneController extends Controller
{
    public function index(Request $request)
    {

        if($request->get('nom') == null){

            $personnes = Personne::index()->get(); //->paginate(15);
            return view('personne.index', compact('personnes'));
        }

        $personnes = Personne::index()->where('nom', 'like', '%'.$request->get('nom').'%')->get(); //->paginate(15);
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

    public function routine($id){

    }
}
