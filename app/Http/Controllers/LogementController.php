<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logements = Logement::orderBy('id', 'desc');
        return view('pages.logement.logement', compact('logements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createlogcite(Request $request)
    {
        $idcite = $request->idcite;
        return view('pages.logement.logementcitecreate', compact('idcite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storelogcite(Request $request)
    {
        $countlog = Logement::whereRaw("num_log = '$request->num_log' AND cite_id = $request->idcite")->count();
        $cite = Cite::where('id', $request->idcite)->first();

        if ($countlog > 0) {
            return redirect()->route('liste.log', ['idcite' => $request->idcite])->with('error', "Le logement '$request->num_log' existe déjà dans '$cite->libelle_cite'");
        } else {
            $request->validate([
                'num_log' => 'required|string',
                'prix' => 'required'
            ]);

            $logcite = Logement::create([
                'num_log' => $request->num_log,
                'prix' => $request->prix,
                'cite_id' => $request->idcite
            ]);

            return redirect()->route('liste.log', ['idcite' => $request->idcite])->with('success', 'Le logement a été ajouter avec success');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $logementbycites = Logement::orderBy('id', 'desc')->where('cite_id', $request->idcite)->get();
        $cite = Cite::where('id', $request->idcite)->first();
        $idcite = $request->idcite;
        return view('pages.logement.logementcite', compact('logementbycites', 'idcite', 'cite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function edit(Logement $logement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logement $logement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logement $logement)
    {
        //
    }
}
