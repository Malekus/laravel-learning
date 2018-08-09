<?php

namespace App\Http\Controllers;

use App\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('configuration.index');
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
        $configuration = Configuration::create($request->all());
        return \response()->json(\view('ajax.configuration.line')->with(['configuration' => $configuration])->render());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configuration = Configuration::findOrFail($id);
        return \response()->json(\view('ajax.configuration.show')->with(['configuration' => $configuration, 'titleModal' => 'Personne'])->render());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configuration = Configuration::findOrFail($id);
        return \response()->json(\view('configuration.ajax.edit')->with(['configuration' => $configuration, 'titleModal' => 'Personne'])->render());
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
        $configuration = Configuration::findOrFail($id);
        if (!$configuration) {
            return response()->json(null, 404);
        }
        $configuration->update($request->all());
        return redirect(route('configuration.index'));
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

    public function modal($type, $libelle = null, $action)
    {
        if ($action == 'addModal') {
            if ($type === 'Rendez-vous') return \response()->json(\view('configuration.ajax.add')->with(['title' => 'Action'])->render());
            return \response()->json(\view('configuration.ajax.add')->with(['title' => $type])->render());
        }

        $configuration = Configuration::where([['type', $type], ['libelle', $libelle]])->first() ? Configuration::where([['type', $type], ['libelle', $libelle]])->first() : Configuration::where([['type', 'Problème'], ['libelle', $type], ['libelle2', $libelle]])->first();

        if ($action == "showModal") {
            return \response()->json(\view('configuration.ajax.show')->with(['configuration' => $configuration, 'titleModal' => $configuration->categorie])->render());
        }
        if ($action == "editModal") {
            return \response()->json(\view('configuration.ajax.edit')->with(['configuration' => $configuration, 'titleModal' => $configuration->categorie])->render());
        }
        if ($action == "deleteModal") {
            return \response()->json(\view('configuration.ajax.delete')->with(['configuration' => $configuration, 'titleModal' => $configuration->categorie])->render());
        }
        return null;
    }

    public static function content($title = 'Personne')
    {
        $configurations = Configuration::where('categorie', $title)
            ->orderBy('type', 'asc')
            ->get(['id', 'categorie', 'type', 'libelle', 'libelle2', 'created_at']);
        return view('configuration.ajax.content', compact(['configurations', 'title']));
    }
}
