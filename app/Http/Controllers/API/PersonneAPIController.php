<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Personne;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Resources\Personne as PersonneResource;


class PersonneAPIController extends Controller
{

    public function index()
    {
        return response()->json(PersonneResource::collection(Personne::all()), 200, [], JSON_NUMERIC_CHECK);
    }


    public function store(Request $request)
    {
        $personne = Personne::create($request->all());
        return response()->json(new PersonneResource($personne), 201, [], JSON_NUMERIC_CHECK);
    }


    public function show($id)
    {
        $personne = Personne::find($id);
        if(!$personne){
            return response()->json(null, 404);
        }
        return response()->json(new PersonneResource($personne), 200, [], JSON_NUMERIC_CHECK);
    }


    public function update(Request $request, $id)
    {
        $personne = Personne::find($id);
        if(!$personne){
            return response()->json(null, 404);
        }
        $personne->update($request->all());
        return new PersonneResource($personne);
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
