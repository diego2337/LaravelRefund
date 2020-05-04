<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Refund;
// use App\Repository\UsuarioRepository;

class UsuarioController extends ControllerAbstract
{
    // /**
    //  * The user repository instance.
    //  *
    //  * @var UsuarioRepository
    //  */
    // protected $usuarios;

    /**
     * Create a new controller instance.
     *
     * @param UsuarioRepository $usuarios
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->usuarios = $usuarios;
    }

    /**
     * List all users.
     * @return Response
     */
    public function list()
    {
        /** Get all users */
        // return Usuario::get();
        return Usuario::orderBy('id', 'asc')->get();
    }

    /** Get all refunds from this user */
    // $refunds = Refund::where('userId', $request->identification)->get();

    // /** List all refunds */
    // return view('refunds.list', [
    //     'refunds' => $refunds,
    // ]);

    /**
     * Create a new user.
     *
     * @param  Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        /** Create user */
        $usuario = new Usuario;
        $usuario->name = $request->name;
        $usuario->id = (int)$request->identification;
        $usuario->jobRole = $request->jobRole;
        $usuario->createdAt = $request->createdAt;

        $usuario->save();
    }
}
