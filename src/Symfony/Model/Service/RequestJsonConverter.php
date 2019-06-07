<?php

namespace App\Symfony\Model\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RequestJsonConverter
{
    /**
     * @param Request $request
     * @return array
     */
    public function convertJsonStringToArray(Request $request): array
    {
        if ($request->getContentType() != 'json' || !$request->getContent()) {
            return [];
        }
        $data = json_decode($request->getContent(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new BadRequestHttpException('invalid json body: ' . json_last_error_msg());
        }
        return is_array($data) ? $data : array();
    }
}
