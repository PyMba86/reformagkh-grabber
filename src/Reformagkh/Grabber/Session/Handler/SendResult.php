<?php

namespace Reformagkh\Grabber\Session\Handler;

class SendResult {

    /**
     * The response as an XML string
     *
     * @var string
     */
    public $responseXml;

    /**
     * The response as returned by PHP's \SoapClient
     *
     * @var \stdClass|array
     */
    public $responseObject;

    /**
     * Which version of the message was called
     *
     * @var string|float
     */
    public $messageVersion;

    /**
     * Exception that occurred while sending
     * @var \Exception
     */
    public $exception;
}
