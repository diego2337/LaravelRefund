<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Services\UserService;
use App\Exceptions\UserExceptions;
use Apps\Http\Requests\UserFormRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as StatusCode;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    /**
     * The user service instance.
     *
     * @var UserService
     */
    protected $userService;

    /**
     * Create a new UserController instance.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a list of users.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            return Response::json($this->userService->all(), StatusCode::HTTP_OK);
        } catch(Exception $e) {
            return Response::json($e, StatusCode::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(UserFormRequest $request)
    {
        return Response::json($this->userService->insert(), StatusCode::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        try {
            return Response::json($this->userService->show($id), StatusCode::HTTP_OK);
        } catch(Exception $e) {
            return Response::json($e, StatusCode::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(UserFormRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        //
    }
}
