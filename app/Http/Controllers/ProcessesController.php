<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProcessCreateRequest;
use App\Http\Requests\ProcessUpdateRequest;
use App\Repositories\ProcessRepository;
use App\Validators\ProcessValidator;


class ProcessesController extends Controller
{

    /**
     * @var ProcessRepository
     */
    protected $repository;

    /**
     * @var ProcessValidator
     */
    protected $validator;

    public function __construct(ProcessRepository $repository, ProcessValidator $validator)
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
        $processes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $processes,
            ]);
        }

        return view('processes.index', compact('processes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProcessCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $process = $this->repository->create($request->all());

            $response = [
                'message' => 'Process created.',
                'data'    => $process->toArray(),
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
        $process = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $process,
            ]);
        }

        return view('processes.show', compact('process'));
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

        $process = $this->repository->find($id);

        return view('processes.edit', compact('process'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProcessUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProcessUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $process = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Process updated.',
                'data'    => $process->toArray(),
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
                'message' => 'Process deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Process deleted.');
    }
}
