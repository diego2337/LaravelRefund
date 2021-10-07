<?php

declare(strict_types=1);

namespace App\Exceptions;

class DomainExceptions
{
    private $type;
    private $messageForHumans;
    private $support;
    private $httpCode;
    private $response;
    private $data;

    public function __construct(
        string $type,
        string $messageForHumans,
        string $support,
        int $httpCode = null,
        array $data = []
    )
    {
        $this->type             = $type;
        $this->messageForHumans = $messageForHumans;
        $this->support          = $support;
        $this->httpCode         = is_null($httpCode) ? 500 : $httpCode;
        $this->data             = $data;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getMessageForHumans()
    {
        return $this->messageForHumans;
    }

    /**
     * @return mixed
     */
    public function getSupport()
    {
        return $this->support;
    }

    /**
     * @return mixed
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    public function toArray()
    {
        return [
            'type'             => $this->type,
            'messageForHumans' => $this->messageForHumans,
            'support'          => $this->support,
            'httpCode'         => $this->httpCode,
            'data'             => $this->data,
        ];
    }
}
