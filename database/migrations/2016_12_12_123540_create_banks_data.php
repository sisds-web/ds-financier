<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $repository = app(\DSFinancier\Repositories\BankRepository::class);

        foreach ($this->getData() as $bankArray){
            $repository->create($bankArray);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

    public function getData(){
        return [
            ['cod'=>'001','name'=>'Banco do Brasil.'],
            ['cod'=>'217','name'=>'Banco Bradesco S.A.'],
            ['cod'=>'104','name'=>'Caixa Econômica Federal.'],
            ['cod'=>'341','name'=>'Itaú Unibanco S.A.'],
            ['cod'=>'356','name'=>'Banco Real S.A.'],
            ['cod'=>'033','name'=>'Banco Santander.'],
            ['cod'=>'399','name'=>'HSBC Bank Brasil S.A.']
        ];
    }
}
