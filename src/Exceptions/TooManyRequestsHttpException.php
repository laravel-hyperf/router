<?php

declare(strict_types=1);

namespace SwooleTW\Hyperf\Router\Exceptions;

use SwooleTW\Hyperf\Foundation\Exceptions\HttpException;
use Throwable;

class TooManyRequestsHttpException extends HttpException
{
    /**
     * @param null|int|string $retryAfter The number of seconds or HTTP-date after which the request may be retried
     */
    public function __construct(
        null|int|string $retryAfter = null,
        string $message = '',
        int $code = 0,
        Throwable $previous = null,
        array $headers = []
    ) {
        if ($retryAfter) {
            $headers['Retry-After'] = $retryAfter;
        }

        parent::__construct(429, $message, $code, $previous, $headers);
    }
}
