<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Adresses;
use App\Models\Cite;
use App\Models\Logement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\ElseIf_;

class UserAuthController extends Controller
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
        return view('auth.login');
    }

    public function register()
    {
        $adresses = Adresses::all();
        return view('auth.register', compact('adresses'));
    }

    public function login(Request $request)
    {

        $user = User::where('email', '=', $request -> email) -> first();

        if($user) {
            if(Hash::check($request -> password, $user -> password)) {
                $request -> session() -> put('user_id_auth', $user -> id);
                return redirect('menu');
            } else {
                return back() -> with('fail', 'Password not matches');
            }
        } else {
            return back() -> with('fail', 'This email is not registered');
        }

    }

    public function logout()
    {
        if(Session::has('user_id_auth')) {
            Session::pull('user_id_auth');
            return redirect('login');
        }
    }

    public function autorosation()
    {
        if(!Gate::allows('access-admin')) {
            abort('403');
        }
    }

    public function dash()
    {
        //UTILISATION AUHTUSER
        $user = $this->auth->user();

        // count
        $citetotal = Cite::where('user_id', $user->id)->count();
        $achattotal = Achat::where('user_id', $user->id)->count();
        $prixlog = Logement::sum('prix');
        $countlognovendu = Logement::where('isvendu', 0)->count();
        $countlogtotal = Logement::count();
        $plog = ($countlognovendu*100)/$countlogtotal;


        if(Session::has('user_id_auth')) {
            $data = User::where('id', '=', Session::get('user_id_auth')) -> first();
        }
        return view('frontend.home', compact(
            'data',
            'citetotal',
            'achattotal',
            'prixlog',
            'plog'
        ));

    }

    public function profile()
    {

        if(Session::has('user_id_auth')) {
            $data = User::where('id', '=', Session::get('user_id_auth')) -> first();
        }
        return view('frontend.profile', compact('data'));

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|unique:users',
            'adresse_id' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:4|max:12|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::create([
            'name' => $request -> name,
            'adresse_id' => $request -> adresse_id,
            'role_id' => 1,
            'email' => $request -> email,
            'password' => Hash::make($request -> password)
        ]);

        $request -> session() -> put('user_id_auth', $user -> id);

        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request -> validate([
            'name' => 'required',
            'adresse_id' => 'required',
            'email' => 'required|email|max:255',
        ]);

        $user_info = User::where('id', '=', $request -> id) -> first();

        if( $user_info -> email != $request -> email) {
            $request -> validate([
                'email' => 'required|email|max:255|unique:users',
            ]);
        }

        $user->update([
            "name" => $request -> name,
            "adresse_id" => $request -> adresse_id,
            "email" => $request -> email,
        ]);

        return back() -> with("success", "Profile mise à jour avec succés");
    }

    public function Update_Password(Request $request, User $user)
    {
        $request -> validate([
            'current_password' => 'required',
            'password' => 'required|min:4|max:12|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user_info = User::where('id', '=', $request -> id) -> first();

        if($user_info) {
            if(Hash::check($request -> current_password, $user_info -> password)) {
                $user->update([
                    "password" => Hash::make($request -> password),
                ]);
                return back() -> with('success', 'Password modified');
            } else {
                return back() -> with('fail', 'Pasusersword is incorect');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user -> delete();
        if(Session::has('user_id_auth')) {
            Session::pull('user_id_auth');
            return redirect('login') -> with('message', 'Your account has been deleted');
        }
    }
}
