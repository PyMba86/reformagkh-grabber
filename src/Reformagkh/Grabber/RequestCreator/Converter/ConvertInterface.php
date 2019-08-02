<?php

namespace Reformagkh\Grabber\RequestCreator\Converter;

use Reformagkh\Grabber\Message\BaseMessage;
use Reformagkh\Grabber\Params\RequestCreatorParams;

interface ConvertInterface {

    public function convert($requestOptions): BaseMessage;

    public function setParams(RequestCreatorParams $params): void;
}
