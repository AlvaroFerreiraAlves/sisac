<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SolicitationCreateRequest;
use App\Http\Requests\SolicitationUpdateRequest;
use App\Repositories\SolicitationRepository;
use App\Validators\SolicitationValidator;
use App\Entities\User;


class SolicitationsController extends Controller
{

    /**
     * @var SolicitationRepository
     */
    protected $repository;

    /**
     * @var SolicitationValidator
     */
    protected $validator;

    public function __construct(SolicitationRepository $repository, SolicitationValidator $validator)
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
        $solicitations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $solicitations,
            ]);
        }

        return view('solicitations.index', compact('solicitations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SolicitationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $solicitation = $this->repository->create([
                'name' => $request['name'],
                'matricula' => $request['matricula'],
                'email' => $request['email'],
                'cpf' => $request['cpf'],
                'password' => bcrypt($request['password']),
                'status' => $request['status'],
                'id_curso' => $request['id_curso']
            ]);

            $response = [
                'message' => 'Solicitation created.',
                'data'    => $solicitation->toArray(),
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
        $solicitation = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $solicitation,
            ]);
        }

        return view('solicitations.show', compact('solicitation'));
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

        $solicitation = $this->repository->find($id);

        return view('solicitations.edit', compact('solicitation'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SolicitationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $solicitation = $this->repository->update($request->all(), $id);

          //  dd($solicitation->status) ;

            if($solicitation->status == 1){
                User::create([
                    'name' => $request['name'],
                    'matricula' => $request['matricula'],
                    'email' => $request['email'],
                    'cpf' => $request['cpf'],
                    'password' => bcrypt($request['password']),
                    'status' => $request['status'],
                    'id_curso' => $request['id_curso']
                ]);
            }else {
                return 'erro';
            }

            $response = [
                'message' => 'Solicitation updated.',
                'data'    => $solicitation->toArray(),
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
                'message' => 'Solicitation deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Solicitation deleted.');
    }
}
