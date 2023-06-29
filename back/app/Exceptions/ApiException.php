<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public function __construct(int $code, string $message, $errors = [])
    {
        $data = [
            'error' => [
                'code' => $code,
                'message' => $message,
            ]
        ];

        if (!empty($errors)) {
            $data['error']['errors'] = $errors;
        }

        parent::__construct(response()->json($data)->setStatusCode($code, $message));
    }
}
