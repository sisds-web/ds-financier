<?php

namespace DSFinancier\Events;


use DSFinancier\Models\Bank;
use Illuminate\Http\UploadedFile;

class BankUploadEvent
{
    private $bank;
    private $logo;

    public function __construct(Bank $bank, UploadedFile $logo = null)
    {
        $this->bank = $bank;
        $this->logo = $logo;
    }

    public function getBank()
    {
        return $this->bank;
    }

    public function getLogo()
    {
        return $this->logo;
    }


}
