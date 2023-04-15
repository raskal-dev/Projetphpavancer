<?php

namespace App\Http\Controllers;

use FPDF;
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
    public function store(Request $request)
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

        $logement = Logement::where('id', '=', $request->log_id)->first();

        $achat = Achat::create([
            'client_id' => $client->id,
            'log_id' => $logement->id,
            'typevente_id' => $request->typevente_id,
            'user_id' => $user->id
        ]);

        $logement->update([
            'isvendu' => true,
        ]);

        return redirect()->route('achat')->with('success', "L'achat du logement de '$client->nom_cli $client->prenom_cli' a été fait avec success");
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

    public function printActeDevente(Request $request)
    {
        $achat = Achat::where('id', '=', $request->id)->first();

        // $user = $this->auth->user();
        // $agence = $user->name;
        // $adresse = $user->adresse->adresse;
        // $client = $achat->client;
        // $logement = $achat->logement;
        // $mode_paye = $achat->typevente->libelle;

        $pdf = new FPDF();

        $pdf->AddPage('P', 'A4', 0);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode("Mande v ??"), 0, 0);


        // $pdf->Cell(0, 10, utf8_decode("$agence"), 0, 0);

        // $pdf->Cell(-180);
        // $pdf->Cell(0, 10, utf8_decode("Facture pour $client->nom_cli $client->prenom_cli"), 0, 0);

        // $pdf->Cell(-60);
        // $pdf->Cell(0, 10, utf8_decode("Adresse: $adresse"), 0, 1);

        // $pdf->Ln(-3);

        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(0, 10, utf8_decode("$adresse"), 0, 1);

        // $_out = "";
        // for ($i=0; $i < 135; $i++) {
        //     $_out .= "~";
        // }

        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(0, 10, utf8_decode("$_out"), 0, 1);

        // $pdf->SetFont('Arial', 'B', 12);

        // $pdf->Cell(0, 10, 'Client:', 0, 1);

        // $pdf->Cell(50, 10, 'Nom:', 0, 0);
        // $pdf->Cell(0, 10, "$client->nom_cli", 0, 0);
        // $pdf->Cell(-100);
        // $pdf->Cell(50, 10, 'Téléphone', 0, 0);
        // $pdf->Cell(0, 10, $client->tel_cli, 0, 1);

        // $pdf->Cell(50, 10, 'Prenom:', 0, 0);
        // $pdf->Cell(0, 10, "$client->prenom_cli", 0, 0);
        // $pdf->Cell(-100);
        // $pdf->Cell(50, 10, 'Email', 0, 0);
        // $pdf->Cell(0, 10, "$client->email_cli", 0, 1);

        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(0, 10, utf8_decode("$_out"), 0, 1);

        // $pdf->Ln();

        // $pdf->SetFont('Arial', '', 10);

        // $pdf->Cell(0, 10, 'LOGEMENT:', 0, 1);

        // $pdf->Cell(60, 10, 'NUMERO LOGEMENT', 1, 0, 'C');
        // $pdf->Cell(50, 10, 'PrixT', 1, 0, 'C');

        // $pdf->Cell(60, 10, utf8_decode("$achat->log_id"), 1, 0, 'C');
        // $pdf->Cell(50, 10, utf8_decode("$achat->logement->prix MGA"), 1, 1, 'C');



        $pdf->Ln();

        // $pdf->Cell(0, 10, "Signature", 0, 1, 'R');

    	$pdf->Output();
    }
}
