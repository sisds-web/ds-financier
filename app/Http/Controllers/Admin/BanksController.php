<?php

namespace DSFinancier\Http\Controllers\Admin;

use DSFinancier\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use DSFinancier\Http\Requests\BankCreateRequest;
use DSFinancier\Http\Requests\BankUpdateRequest;
use DSFinancier\Repositories\BankRepository;
use Illuminate\Support\Facades\Storage;

class BanksController extends Controller
{

    /**
     * @var BankRepository
     */
    protected $repository;


    public function __construct(BankRepository $repository)
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
        //$this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $banks = $this->repository->paginate(10);

        /*if (request()->wantsJson()) {

            return response()->json([
                'data' => $banks,
            ]);
        }*/

        return view('admin.banks.index', compact('banks'));
    }


    /**
     * Mostrar Formulário de Criação de banco
     */
    public function create(){
        return view('admin.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BankCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BankCreateRequest $request)
    {
        try{
            $this->repository->create($request->all());

            /*$response = [
                'message' => 'Banco Cadastrado com Sucesso...!',
                'data'    => $bank->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }*/

            return redirect()->back()->with('success', 'Banco Cadastrado com Sucesso...!');
        }catch (Exception $e){
            return redirect()->back()->with('erro', $e->getMessage());
        }

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

        $bank = $this->repository->find($id);

        return view('admin.banks.edit', compact('bank'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BankUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BankUpdateRequest $request, $id)
    {

        try{
            $this->repository->update($request->all(),$id);
            /*$response = [
                'message' => 'Dados Alterados com Sucesso.',
                'data'    => $bank->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }*/

            return redirect()->back()->with('success', 'Dados Alterados com Sucesso...!');
        }catch (Exception $e){
            return redirect()->back()->with('erro', $e->getMessage());
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
        $bank = $this->repository->find($id);

        if($this->repository->delete($id)){
            Storage::delete('public/banks/images/'.$bank->logo);
        }



        /*if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Bank deleted.',
                'deleted' => $deleted,
            ]);
        }*/

        return redirect()->back()->with('success', 'Banco apagado com sucesso...!');
    }
}
