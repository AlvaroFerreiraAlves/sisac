<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserTypesUserCreateRequest;
use App\Http\Requests\UserTypesUserUpdateRequest;
use App\Repositories\UserTypesUserRepository;
use App\Validators\UserTypesUserValidator;


class UserTypesUsersController extends Controller
{

    /**
     * @var UserTypesUserRepository
     */
    protected $repository;

    /**
     * @var UserTypesUserValidator
     */
    protected $validator;

    public function __construct(UserTypesUserRepository $repository, UserTypesUserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $userTypesUsers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userTypesUsers,
            ]);
        }

        return view('userTypesUsers.index', compact('userTypesUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserTypesUserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypesUserCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userTypesUser = $this->repository->create($request->all());

            $response = [
                'message' => 'UserTypesUser created.',
                'data'    => $userTypesUser->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userTypesUser = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userTypesUser,
            ]);
        }

        return view('userTypesUsers.show', compact('userTypesUser'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $userTypesUser = $this->repository->find($id);

        return view('userTypesUsers.edit', compact('userTypesUser'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserTypesUserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UserTypesUserUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userTypesUser = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'UserTypesUser updated.',
                'data'    => $userTypesUser->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'UserTypesUser deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserTypesUser deleted.');
    }
}
