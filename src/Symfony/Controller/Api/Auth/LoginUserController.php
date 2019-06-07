<?php

namespace App\Symfony\Controller\Api\Auth;

use App\Core\Query\LoginUser;
use App\Symfony\Model\Controller\Api\Auth\LoginUserRequestDto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Symfony\Model\Service\RequestJsonConverter;
use Symfony\Component\Routing\Annotation\Route;

final class LoginUserController
{
    use HandleTrait;

    private $messagrBus;

    private $jsonConverter;

    public function __construct(MessageBusInterface $messageBus, RequestJsonConverter $jsonConverter)
    {
        $this->messageBus = $messageBus;
        $this->jsonConverter = $jsonConverter;
    }

    /**
     * @Route("/auth/login", name="auth_login", methods={"POST"})
     */
    public function __invoke(Request $request)
    {
        $requestDto = new LoginUserRequestDto($this->jsonConverter->convertJsonStringToArray($request));
        $result = $this->query(new LoginUser($requestDto));

        $status = array_key_exists('error', $result) ? 400 : 200;

        return new JsonResponse($result, $status);
    }

    private function query(LoginUser $query)
    {
        return $this->handle($query);
    }
}