<?php

namespace App\Http\Controllers;

use App\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configurations = Configuration::where('categorie', 'Personne')
            ->orderBy('type', 'asc')
            ->get(['id', 'categorie', 'type', 'libelle', 'libelle2', 'created_at']);
        //return view('configuration.index', compact('configurations'));
        $types = Configuration::where('categorie', 'Personne')
            ->groupBy('type')
            ->get(['type']);
        return view('configuration.test', compact('types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config = Configuration::create($request->all());
        //return response()->json(new PersonneResource($personne), 201, [], JSON_NUMERIC_CHECK);
        return response()->json(['success' => true, 'message' => 'Coool'], 201, [], JSON_PRETTY_PRINT);
        //return redirect(route('ajax.configTab', ['categorie']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $config = Configuration::find($id);
        if(!$config){
            return response()->json(null, 404);
        }
        $config->delete();
        return redirect(route('configuration.index'));
    }
}
