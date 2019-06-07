<?php
namespace App\Symfony\Model\Controller\Api\Auth;

use App\Core\UserAccount\Aplication\Query\LoginUser\LoginUserResult;

class LoginUserResponseDto
{
    private $token;

    public function __construct(LoginUserResult $result)
    {
        $this->token = $result->getToken();
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
}