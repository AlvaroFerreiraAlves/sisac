<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RegulationCreateRequest;
use App\Http\Requests\RegulationUpdateRequest;
use App\Repositories\RegulationRepository;
use App\Validators\RegulationValidator;


class RegulationsController extends Controller
{

    /**
     * @var RegulationRepository
     */
    protected $repository;

    /**
     * @var RegulationValidator
     */
    protected $validator;

    public function __construct(RegulationRepository $repository, RegulationValidator $validator)
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
        $regulations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $regulations,
            ]);
        }

        return $regulations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegulationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $regulation = $this->repository->create($request->all());

            $response = [
                'message' => 'Regulation created.',
                'data'    => $regulation->toArray(),
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
        $regulation = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $regulation,
            ]);
        }

        return $regulation;
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

        $regulation = $this->repository->find($id);

        return view('regulations.edit', compact('regulation'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RegulationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $regulation = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Regulation updated.',
                'data'    => $regulation->toArray(),
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
                'message' => 'Regulation deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Regulation deleted.');
    }
}
