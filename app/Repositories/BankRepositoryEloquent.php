<?php

namespace DSFinancier\Repositories;

use DSFinancier\Events\BankUploadEvent;
use Illuminate\Http\UploadedFile;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use DSFinancier\Models\Bank;

/**
 * Class BankRepositoryEloquent
 * @package namespace DSFinancier\Repositories;
 */
class BankRepositoryEloquent extends BaseRepository implements BankRepository
{

    public function create(array $attributes)
    {
        //Pegando a imagem e sobrescrevendo

        if(isset($attributes['logo'])){
            $logo = $attributes['logo'];
        }else{
            $logo = null;
            //Usando uma imagem  padrão
            $attributes['logo'] = "logo_bank_default.png";
        }

        //Pegando o novo model já com a nova imagem
        $model = parent::create($attributes);

        //Gerando o evento
        $event = new BankUploadEvent($model,$logo);

        //Disparando o evento
        event($event);

        //Retornando o model já com o logo
        return $model;
    }

    public function update(array $attributes, $id)
    {
        $logo = null;
        if(isset($attributes['logo']) && $attributes['logo'] instanceof UploadedFile){
            $logo = $attributes['logo'];
            unset( $attributes['logo']);
        }

        $model = parent::update($attributes, $id);

        //Gerando o evento
        $event = new BankUploadEvent($model,$logo);

        //Disparando o evento
        event($event);

        //Retornando o model já com o logo
        return $model;
    }


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
