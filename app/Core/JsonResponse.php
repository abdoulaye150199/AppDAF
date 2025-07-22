<?php

namespace App\Core;

class JsonResponse 
{
    public static function success($data, string $message = '', int $code = 200): void 
    {
        self::send([
            'data' => $data,
            'statut' => 'success',
            'code' => $code,
            'message' => $message ?: 'Le numéro de carte d\'identité a été retrouvé'
        ], $code);
    }

    public static function error(string $message = '', int $code = 404): void 
    {
        self::send([
            'data' => null,
            'statut' => 'error',
            'code' => $code,
            'message' => $message ?: 'Le numéro de carte d\'identité non retrouvé'
        ], $code);
    }

    private static function send(array $data, int $code): void 
    {
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode($data);
        exit;
    }
}