<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Http\Request;
use \App\Http\Resources\Personne as PersonneResource;

class PersonneController extends Controller
{
    public function index()
    {
        $personnes = Personne::index()->get(); //->paginate(15);
        return view('personne.index', compact('personnes'));
    }


    public function store(Request $request)
    {

        $personne = Personne::create($request->all());
        //return response()->json(new PersonneResource($personne), 201, [], JSON_NUMERIC_CHECK);
        return view('personne.create');
    }

    public function show($id)
    {
        $personne = Personne::find($id);
        if(!$personne){
            return response()->json(null, 404);
        }
        return response()->json(new PersonneResource($personne), 200, [], JSON_NUMERIC_CHECK);

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
        return new PersonneResource($personne);
    }
}
