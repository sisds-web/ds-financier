<?php

namespace DSFinancier\Listeners;

use DSFinancier\Events\BankUploadEvent;
use DSFinancier\Models\Bank;
use DSFinancier\Repositories\BankRepository;

class BankUploadArqListener
{
    /**
     * @var BankRepository
     */
    private $repository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(BankRepository $repository)
    {

        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  BankUploadEvent  $event
     * @return void
     */
    public function handle(BankUploadEvent $event)
    {
        $bank = $event->getBank();
        $logo = $event->getLogo();

        if($logo){
            //Gerar novo nome para o arquivo
            //Testando pela data de criação e data de alteração
            $name = time().$logo->getClientOriginalName();
            $nameArq = $bank->created_at != $bank->updated_at ? $bank->logo : md5($name).'.'.$logo->guessExtension();

            //Pegar o destino do arquivo
            $destFile = Bank::logosDir();

            //Fazer o upload do arquivo
            \Storage::disk('public')->putFileAs($destFile,$logo,$nameArq);

            if($bank->created_at == $bank->updated_at){
                $this->repository->update(['logo'=>$nameArq],$bank->id);
            }

        }

    }
}
