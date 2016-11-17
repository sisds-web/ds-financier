<?php

namespace  DSFinancier\Jwt;

use Tymon\JWTAuth\Manager as JwtManager;
use Tymon\JWTAuth\Token;
/*
 * SOBRESCREVENDO A CLASSE MANAGER DO JWT
 */
class Manager extends JwtManager{

    public function refresh(Token $token, $forceForever = false)
    {
        $this->setRefreshFlow();
        return parent::refresh($token, $forceForever);
    }

}