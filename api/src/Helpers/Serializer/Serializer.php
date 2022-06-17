<?php

declare(strict_types=1);

namespace App\Helpers\Serializer;

use App\Game\Bones\DTO\Request\Bones;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer as JMS;
use JMS\Serializer\SerializerBuilder;

class Serializer
{
    /**
     * @var mixed
     */
    protected mixed $data;

    /**
     * @var string
     */
    protected string $format;

    /**
     * @var SerializationContext|null
     */
    protected ?SerializationContext $context;

    /**
     * @var JMS
     */
    protected JMS $serializer;

    /**
     * @var mixed
     */
    protected mixed $resultData;

    public function __construct(
        mixed $data,
        string $format = 'json',
        ?SerializationContext $context = null,
    ) {
        $this->data = $data;
        $this->format = $format;
        $this->context = $context ?? SerializationContext::create()->setSerializeNull(true);

        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @return string
     */
    public function serialize(): string
    {
        $this->resultData = $this->serializer->serialize($this->data, $this->format, $this->context);

        return $this->getResultData();
    }

    public function deserialize(string $type): object
    {
        $this->resultData = $this->serializer->deserialize($this->data, $type, 'json');

        return $this->getResultData();
    }

    /**
     * @return mixed
     */
    public function getResultData(): mixed
    {
        return $this->resultData;
    }
}
