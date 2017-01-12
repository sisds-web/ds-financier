<?php

namespace DSFinancier\Http\Controllers\Api;

use DSFinancier\Http\Controllers\Controller;
use DSFinancier\Repositories\BankRepository;

class BanksApiController extends Controller
{

    /**
     * @var BankRepository
     */
    protected $repository;


    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $banks = $this->repository->all();

        return $banks;
    }

}
