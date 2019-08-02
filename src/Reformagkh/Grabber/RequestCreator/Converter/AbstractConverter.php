<?php

namespace Reformagkh\Grabber\RequestCreator\Converter;

use Reformagkh\Grabber\Params\RequestCreatorParams;

abstract class AbstractConverter implements ConvertInterface {

    /**
     * @var RequestCreatorParams
     */
    protected $params;

    /**
     * @param RequestCreatorParams $params
     */
    public function setParams(RequestCreatorParams $params): void
    {
        $this->params = $params;
    }
}
