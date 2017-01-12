<?php

namespace DSFinancier\Transformers;

use League\Fractal\TransformerAbstract;
use DSFinancier\Models\BankAccount;

/**
 * Class BankAccountTransformer
 * @package namespace DSFinancier\Transformers;
 */
class BankAccountTransformer extends TransformerAbstract
{

    /**
     * Transform the \BankAccount entity
     * @param \BankAccount $model
     *
     * @return array
     */
    public function transform(BankAccount $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'      => $model->name,
            'agency'    => $model->agency,
            'account'       => $model->account,
            'default'       => $model->default,
            'bank_id'       => $model->bank_id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
