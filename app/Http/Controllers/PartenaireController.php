<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    public function index(Request $request)
    {

        if($request->get('search') == null){
            $partenaires = Partenaire::index()->paginate(10);
            return view('partenaire.index', compact('partenaires'));
        }

        $partenaires = Partenaire::index()
            ->where('nom', 'like', '%'.$request->get('search').'%')
            ->orWhere('prenom', 'like', '%'.$request->get('search').'%')
            ->paginate(10);
        return view('partenaire.index', compact('partenaires'));
    }


    public function create()
    {
        return view('partenaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partenaire = $request->isMethod('put') ? Partenaire::findOrFail($request->id) :
            new Partenaire($request->except('structure', 'type'));
        $partenaire->structure()->associate(Configuration::find($request->get('structure')));
        $partenaire->type()->associate(Configuration::find($request->get('type')));
        $partenaire->save();
        return redirect(route('partenaire.show', compact('partenaire')));

    }

    public function show($id)
    {
        $partenaire = Partenaire::find($id);
        return view('partenaire.show', ['partenaire' => $partenaire]);
    }

    public function destroy($id)
    {

    }

    public function list_(Request $request){
        $search = $request->get('search') ? $request->get('search') : null;
        if($search === null){
            $partenaires = Partenaire::index()->paginate(10)->withPath('partenaire');
            return view('partenaire.list', compact('partenaires'));
        }

        $partenaires = Partenaire::index()
            ->where('nom', 'like', '%'.$search.'%')
            ->orWhere('prenom', 'like', '%'.$search.'%')->paginate(10)->withPath('partenaire');
        return view('partenaire.list', compact('partenaires'));
    }
}
