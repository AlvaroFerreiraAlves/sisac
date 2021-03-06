<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ActivityTypeCreateRequest;
use App\Http\Requests\ActivityTypeUpdateRequest;
use App\Repositories\ActivityTypeRepository;
use App\Validators\ActivityTypeValidator;


class ActivityTypesController extends Controller
{

    /**
     * @var ActivityTypeRepository
     */
    protected $repository;

    /**
     * @var ActivityTypeValidator
     */
    protected $validator;

    public function __construct(ActivityTypeRepository $repository, ActivityTypeValidator $validator)
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
        $activityTypes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $activityTypes,
            ]);
        }

        return $activityTypes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ActivityTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $activityType = $this->repository->create($request->all());

            $response = [
                'message' => 'ActivityType created.',
                'data'    => $activityType->toArray(),
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
        $activityType = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $activityType,
            ]);
        }

        return $activityType;
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

        $activityType = $this->repository->find($id);

        return view('activityTypes.edit', compact('activityType'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ActivityTypeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $activityType = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ActivityType updated.',
                'data'    => $activityType->toArray(),
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
                'message' => 'ActivityType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ActivityType deleted.');
    }
}
