<?php

namespace App\Http\Controllers;

use App\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{

    public function index()
    {
        return view('configuration.index');
    }

    public function create()
    {
        return view('configuration.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $configuration = Configuration::create($request->all());
        return redirect(route('configuration.index'));
        return \response()->json(\view('ajax.configuration.line')->with(['configuration' => $configuration])->render());
    }

    public function show($id)
    {
        $configuration = Configuration::findOrFail($id);
        return \response()->json(\view('ajax.configuration.show')->with(['configuration' => $configuration, 'titleModal' => 'PersonneResource'])->render());
    }

    public function edit($id)
    {
        $configuration = Configuration::findOrFail($id);
        return \response()->json(\view('configuration.ajax.edit')->with(['configuration' => $configuration, 'title' => $configuration->categorie])->render());
    }

    public function update(Request $request, $id)
    {
        $configuration = Configuration::findOrFail($id);
        if (!$configuration) {
            return response()->json(null, 404);
        }
        $configuration->update($request->all());
        return redirect(route('configuration.index'));
    }

    public function destroy($id)
    {
        $config = Configuration::find($id);
        if(!$config){
            return response()->json(null, 404);
        }
        $config->delete();
        return redirect(route('configuration.index'));
    }

    public function modal($action, $id)
    {


        if ($action == 'addModal') {
            if (strlen($id) === strlen('Rendez-vous')) return \response()->json(\view('configuration.ajax.add')->with(['titleModal' => 'Action'])->render());
            return \response()->json(\view('configuration.ajax.add')->with(['titleModal' => $id])->render());
        }

        $configuration = Configuration::find($id);

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

    public static function content($title = 'PersonneResource')
    {
        $configurations = Configuration::where('categorie', $title)
            ->orderBy('champ', 'asc')
            ->get(['id', 'categorie', 'champ', 'libelle', 'created_at']);
        return view('configuration.ajax.content', compact(['configurations', 'title']));
    }
}
