<?php

namespace App\Core\Abstract;

use App\Core\JsonResponse;

abstract class AbstractController
{
    protected function renderJson($data, string $message = '', int $code = 200): void 
    {
        JsonResponse::success($data, $message, $code);
    }

    protected function renderError(string $message = '', int $code = 404): void 
    {
        JsonResponse::error($message, $code);
    }
}