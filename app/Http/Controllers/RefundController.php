<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refund;
// use App\Repository\RefundRepository;
use App\Usuario;

class RefundController extends ControllerAbstract
{
    // /**
    //  * The refund repository instance.
    //  *
    //  * @var RefundRepository
    //  */
    // protected $refunds;

    /**
     * Create a new controller instance.
     *
     * @param RefundRepository $refunds
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->refunds = $refunds;
    }

    /**
     * List all refunds for a given user.
     *
     * @param Usuario $user
     * @return Response
     */
    public function list(Usuario $user)
    {
        return Refund::where('userId', $user->id)->orderBy('userId', 'asc')->get();
    }

    /**
     * Create a new refund.
     *
     * @param  Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        /** Loop through list of refunds */
        foreach ($request->refunds as $value)
        {
            /** Create refund */
            $refund = new Refund;
            /** Iterate through keys of arrays */
            // $refund->id = $value->id;
            $refund->type = $value["type"];
            $refund->description = $value["description"];
            $refund->date = $value["date"];
            $refund->value = $value["value"];
            /** Store user id */
            $refund->userId = (int)$request->identification;

            $refund->save();
        }
    }

    /**
     * Edit refund.
     * @param Request $request
     * @return void
     */
    public function edit(Request $request)
    {
        /** Find if exists */
        $refund = Refund::find($request->id);
        if(isset($refund))
        {
            $refund->value = (double)$request->value;
        }
        $refund->save();
    }
}
