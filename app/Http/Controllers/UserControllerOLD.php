<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserControllerOLD extends Controller
{
    // /**
    //  * The user repository instance.
    //  *
    //  * @var UserRepository
    //  */
    // protected $Users;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $Users
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->Users = $Users;
    }

    /**
     * List all users.
     * @return Response
     */
    public function list()
    {
        /** Get all users */
        // return User::get();
        return User::orderBy('id', 'asc')->get();
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
        $User = new User;
        $User->name = $request->name;
        $User->id = (int)$request->identification;
        $User->jobRole = $request->jobRole;
        $User->createdAt = $request->createdAt;

        $User->save();
    }
}
