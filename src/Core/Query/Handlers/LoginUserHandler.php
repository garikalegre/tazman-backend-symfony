<?php

namespace App\Core\Query\Handlers;

use App\Core\Query\LoginUser;
use App\Entity\UserAccount;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Authentication\Token\JWTUserToken;

class LoginUserHandler
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(LoginUser $query)
    {
        $dto = $query->getLoginDto();
        $criterias = [];
        if (!is_null($dto->getEmail())) {
            $criterias['email'] = $dto->getEmail();
        }
        if (!is_null($dto->getFacebookId())) {
            $criterias['facebookId'] = $dto->getFacebookId();
        }

        if (count($criterias) == 0) {
            return ['error' => 'Bad request'];
        }
        $user = $this->em->getRepository(UserAccount::class)->findOneBy($criterias);

        if ($user) {
            $authToken = new JWTUserToken();
            $authToken->setUser($user);

            return ['token' => $authToken->getProviderKey() ? $authToken->getProviderKey() : 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXUyJ9YR_D7N9E'];
        } else {
            return ['error' => 'User not found'];
        }
    }
}
