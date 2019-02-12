<?php

namespace App\Http\Controllers;

use App\Action;
use App\Configuration;
use App\Probleme;
use App\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        foreach ($request->except('probleme', 'action', 'complement') as $key => $value){
            if(!in_array($key, array('_method', '_token')))
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
        //
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
}
