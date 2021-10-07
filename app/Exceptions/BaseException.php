<?php

declare(strict_types=1);

namespace App\Exceptions;

abstract class BaseException extends \Exception
{
    protected $description;
    protected $message;
    protected $help;
    protected $transportedMessage;

    public function render()
    {
        return response(['error' => $this->getError()], $this->getHttpStatus());
    }

    public function getError()
    {
        return [
            'shortMessage'       => $this->getShortMessage(),
            'message'            => $this->getMessage(),
            'description'        => $this->getDescription(),
            'help'               => $this->getHelp(),
            'transportedMessage' => $this->getTransportedMessage(),
        ];
    }

    abstract public function getShortMessage();

    abstract public function getDescription();

    public function getHelp()
    {
        return $this->help ?? '';
    }

    public function getTransportedMessage()
    {
        return $this->transportedMessage ?? '';
    }

    abstract public function getHttpStatus();
}
