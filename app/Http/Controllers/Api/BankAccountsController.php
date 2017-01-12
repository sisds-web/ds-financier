<?php

namespace DSFinancier\Http\Controllers\Api;

use DSFinancier\Http\Controllers\Controller;
use DSFinancier\Http\Requests\BankAccountCreateRequest;
use DSFinancier\Http\Requests\BankAccountUpdateRequest;
use DSFinancier\Repositories\BankAccountRepository;




class BankAccountsController extends Controller
{

    /**
     * @var BankAccountRepository
     */
    protected $repository;

    /**
     * @var BankAccountValidator
     */

    public function __construct(BankAccountRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankAccounts = $this->repository->all();

        return $bankAccounts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BankAccountCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountCreateRequest $request)
    {

        $bankAccount = $this->repository->create($request->all());

        //Retorna Status code 201 = created (criado)
        return response()->json($bankAccount->toArray(),201);

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
        $bankAccount = $this->repository->find($id);

        //Retorna Status code 200 = realizado com sucesso , por padrão
        return response()->json($bankAccount->toArray());

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

        $bankAccount = $this->repository->find($id);

        return view('bankAccounts.edit', compact('bankAccount'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BankAccountUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BankAccountUpdateRequest $request, $id)
    {

        $bankAccount = $this->repository->update($request->all(),$id);
        //Retorna Status code 200 = realizado com sucesso , por padrão
        return response()->json($bankAccount->toArray());

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
        $this->repository->delete($id);

        //Retorna Status code 204
        return response()->json([],204);
    }

}
