<?php

declare(strict_types=1);

namespace App\Http;

use Slim\Psr7\Headers;
use Slim\Psr7\Response;
use Slim\Psr7\Factory\StreamFactory;
use Fig\Http\Message\StatusCodeInterface;
use App\Helpers\Serializer\Serializer;

class JsonResponse extends Response
{
    /**
     * JsonResponse constructor.
     *
     * @param $data
     * @param int $status
     */
    public function __construct($data, int $status = StatusCodeInterface::STATUS_OK)
    {
        $jsonContent = (new Serializer($data))->serialize();

        parent::__construct(
            $status,
            new Headers(['Content-Type' => 'application/json']),
            (new StreamFactory())->createStream($jsonContent)
        );
    }
}
