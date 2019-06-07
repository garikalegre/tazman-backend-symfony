<?php
namespace App\Core\Query;
use App\Symfony\Model\Controller\Api\Auth\LoginUserRequestDto;

class LoginUser
{
    private $loginDto;

    /**
     * LoginUser constructor.
     */
    public function __construct(LoginUserRequestDto $requestDto)
    {
        $this->loginDto = $requestDto;
    }

    /**
     * @return LoginUserRequestDto
     */
    public function getLoginDto(): LoginUserRequestDto
    {
        return $this->loginDto;
    }

}
