<?php

namespace Reformagkh\Grabber\Params;

use SoapClient;

class SessionHandlerParams
{
    /**
     * @var string
     */
    public $wsdl;

    /**
     * @var bool
     */
    public $stateful = true;

    /**
     *  override Параметры для SoapClient
     * @var array
     */
    public $soapClientOptions = [];

    /**
     * override Soap клиент
     * @var SoapClient
     */
    public $overrideSoapClient;

    /**
     * override SoapClient WSDL name
     * @var string
     */
    public $overrideSoapClientWsdlName;

    public function __construct($params = [])
    {
        $this->loadFromArray($params);
    }

    protected function loadFromArray(array $params)
    {
        $this->loadWsdl($params);
        $this->loadStateful($params);
        $this->loadOverrideSoapClient($params);
        $this->loadSoapClientOptions($params);
    }

    protected function loadWsdl(array $params)
    {
        if (isset($params['wsdl'])) {
            if (is_string($params['wsdl'])) {
                $this->wsdl = $params['wsdl'];
            }
        }
    }

    protected function loadStateful($params)
    {
        $this->stateful = (isset($params['stateful'])) ? $params['stateful'] : true;
    }

    protected function loadOverrideSoapClient($params)
    {
        if (isset($params['overrideSoapClient']) && $params['overrideSoapClient'] instanceof \SoapClient) {
            $this->overrideSoapClient = $params['overrideSoapClient'];
        }
        if (isset($params['overrideSoapClientWsdlName'])) {
            $this->overrideSoapClientWsdlName = $params['overrideSoapClientWsdlName'];
        }
    }

    protected function loadSoapClientOptions($params)
    {
        if (isset($params['soapClientOptions']) && is_array($params['soapClientOptions'])) {
            $this->soapClientOptions = $params['soapClientOptions'];
        }
    }
}
