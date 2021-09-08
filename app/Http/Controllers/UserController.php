<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;

    /**
     * UserController constructor.
     * @param $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $data = [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ];

        $this->repository->createUser($data);
        return redirect($request->original_link);
    }
}
