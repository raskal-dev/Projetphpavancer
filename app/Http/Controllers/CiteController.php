<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CiteController extends Controller
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
        $user = $this->auth->user();
        $citecount = Cite::where('user_id', $user->id)->count();
        $cites = Cite::orderBy("id", "desc")->where('user_id', $user->id)->paginate(8);
        return view('pages.cite.cite', compact(
            'cites',
        'citecount'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cite.citecreate');
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
            'libelle_cite' => 'required|string|max:255',
        ]);

        $cite = Cite::create([
            'libelle_cite' => $request -> libelle_cite,
            'user_id' => $user->id
        ]);

        return redirect()->route('cite')->with('success', 'La cité a été ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function show(Cite $cite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function edit(Cite $cite)
    {
        return view('pages.cite.citeupdate', compact('cite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cite $cite)
    {
        $request->validate([
            'libelle_cite' => 'required|string|max:255',
        ]);

        $cite->update([
            'libelle_cite' => $request->libelle_cite
        ]);

        return redirect()->route('cite')->with('success', 'La cité a été mettre à jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cite $cite)
    {
        // if (DB::table('terrains')->where('cite_id', $cite->id)->exists()) {
        //     return redirect()->route('cite')->with('errordelete', "Le cité '$cite->libelle_cite' ne peut pas être supprimer car il est encore attaché à une Terrain");
        // } else {
        //     // Supprimer le cité de la base de données
        //     $cite->delete();

        //     // Rediriger l'utilisateur vers la liste des agences avec un message de confirmation
        //     return redirect()->route('cite')->with('success', "La cité '$cite->libelle_cite' a été supprimer avec success");
        // }

            // Supprimer le cité de la base de données
            $cite->delete();

            // Rediriger l'utilisateur vers la liste des agences avec un message de confirmation
            return redirect()->route('cite')->with('success', "La cité '$cite->libelle_cite' a été supprimer avec success");

    }
}
