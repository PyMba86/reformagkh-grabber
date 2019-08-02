<?php

namespace Reformagkh\Grabber\Session\Handler;

use Reformagkh\Grabber\Message\BaseMessage;
use Reformagkh\Grabber\Params\SessionHandlerParams;
use SoapClient;

/**
 * Интерфейс обработчика сессии
 * @package Reformagkh\Grabber\Session\Handler
 */
interface HandlerInterface {

    public function __construct(SoapClient $client, SessionHandlerParams $params);

    public function sendMessage(string $messageName, BaseMessage $message, array $messageOptions): SendResult;

    public function setStateful($stateful): void;

    public function isStateful();

    public function getLastRequest($msgName);

    public function getLastResponse();

    public function getLastRequestHeaders();

    public function getLastResponseHeaders();
}
