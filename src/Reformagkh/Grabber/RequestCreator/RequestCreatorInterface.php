<?php

namespace Reformagkh\Grabber\RequestCreator;

use Reformagkh\Grabber\Message\InvalidArgumentException;
use Reformagkh\Grabber\Message\InvalidMessageException;
use Reformagkh\Grabber\Params\RequestCreatorParams;
use Reformagkh\Grabber\RequestOptions\RequestOptionsInterface;

interface RequestCreatorInterface
{
    /**
     * Создать обьект построителя запроса с параметрами
     * @param RequestCreatorParams $params
     */
    public function __construct(RequestCreatorParams $params);

    /**
     * Создать запрос для данного сообщения с заданным набором параметров для этого сообщения
     * @param string $messageName
     * @param RequestOptionsInterface $params
     * @throws InvalidArgumentException При предоставлении неверных параметров
     * @throws InvalidMessageException При попытке создать обращение, которого нет в wsdl
     * @return mixed
     */
    public function createRequest(string $messageName, RequestOptionsInterface $params);

}
