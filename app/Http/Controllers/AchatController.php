<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Client;
use App\Models\Logement;
use App\Models\Typevente;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    /**
     *
     *
     * @var AuthUser
     */
    private AuthUser $auth;
    public function __construct(AuthUser $auth)
    {
        $this -> auth = $auth;
    }
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
    public function create(Request $request)
    {
        $log_id = $request->logement;
        $logone = Logement::where('id', $request->logement)->first();
        $typeventes = Typevente::all();
        return view('pages.achat.achatcreate', compact(
            'typeventes',
            'log_id',
            'logone'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Logement $logement)
    {
        $user = $this->auth->user();

        $request->validate([
            // Client
            'nom_cli' => 'required|string|max:191',
            'prenom_cli' => 'required|string|max:191',
            'tel_cli' => 'required|string|max:191',
            'email_cli' => 'required|string|max:191',


            // Achat
            'log_id' => 'required',
            'typevente_id' => 'required'
        ]);

        $client = Client::create([
            'nom_cli' => $request->nom_cli,
            'prenom_cli' => $request->prenom_cli,
            'tel_cli' => $request->tel_cli,
            'email_cli' => $request->email_cli,
        ]);

        $client_teo = Client::orderBy('id', 'desc')->first();

        $achat = Achat::create([
            'client_id' => $client_teo->id,
            'log_id' => $request->log_id,
            'typevente_id' => $request->typevente_id,
            'user_id' => $user->id
        ]);

        $logement->update([
            'isvendu' => 1
        ]);

        return back()->with('success', "L'achat du logement de '$client_teo->nom_cli $client_teo->prenom_cli' a été fait avec success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function show(Achat $achat)
    {
        $user = $this->auth->user();
        $achats = Achat::orderBy("id", "desc")->where('user_id', $user->id)->paginate(15);
        return view('pages.achat.achat', compact('achats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function edit(Achat $achat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achat $achat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achat $achat)
    {
        //
    }
}
