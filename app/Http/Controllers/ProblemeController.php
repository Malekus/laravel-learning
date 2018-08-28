<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Personne;
use App\Probleme;
use Illuminate\Http\Request;

class ProblemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('probleme.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $personne = Personne::findOrFail($id);
        return view('probleme.create', compact('personne'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $probleme = new Probleme();
        $probleme->personne()->associate(Personne::find($request->route('personne')));
        $probleme->categorie()->associate(Configuration::find($request->get('categorie')));
        $probleme->type()->associate(Configuration::find($request->get('type')));
        $probleme->accompagnement()->associate(Configuration::find($request->get('accompagnement')));
        $probleme->save();
        return redirect(route('personne.show', ['personne' => $request->route('personne')]));
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
        $probleme->save();
        return redirect(route('personne.show', ['id' => $probleme->personne]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
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
}
