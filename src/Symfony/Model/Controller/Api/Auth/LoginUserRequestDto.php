<?php

namespace App\Symfony\Model\Controller\Api\Auth;

class LoginUserRequestDto
{
    private $email;
    private $password;
    private $facebookId;
    private $token;

    public function __construct(array $params)
    {
        if (array_key_exists('token', $params) && array_key_exists('facebookId', $params)){
            $this->facebookId = $params['facebookId'];
            $this->token = $params['token'];
        }elseif (array_key_exists('email', $params) && array_key_exists('password', $params)){
            $this->email = $params['email'];
            $this->password = $params['password'];
        }
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
}