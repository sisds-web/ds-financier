<?php

namespace DSFinancier\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use DSFinancier\Repositories\BankRepository;
use DSFinancier\Models\Bank;
use DSFinancier\Validators\BankValidator;

/**
 * Class BankRepositoryEloquent
 * @package namespace DSFinancier\Repositories;
 */
class BankRepositoryEloquent extends BaseRepository implements BankRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bank::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
