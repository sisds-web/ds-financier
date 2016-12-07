<?php

namespace DSFinancier\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Bank extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'cod',
        'name',
        'logo'
    ];

    public static function logosDir(){
        return "banks/images";
    }

    public function pathLogo(){
        return asset('storage/banks/images/');
    }

}
