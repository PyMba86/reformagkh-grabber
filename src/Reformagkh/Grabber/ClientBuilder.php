<?php

namespace Reformagkh\Grabber;

use Reformagkh\Grabber\Soap\SoapClientFactory;

class ClientBuilder
{
    /**
     * @var string
     */
    const WSDL_URL = 'https://api.reformagkh.ru/api/wsdl';

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var array
     */
    private $soapOptions;

    /**
     * @var SoapClientFactory
     */
    private $soapClientFactory;

    /**
     * @param string $username
     * @param string $password
     * @param array $soapOptions
     */
    public function __construct($username, $password, array $soapOptions = array())
    {
        $this->username = $username;
        $this->password = $password;
        $this->soapOptions = $soapOptions;
    }

    /**
     * @param SoapClientFactory $soapClientFactory
     */
    public function setSoapClientFactory(SoapClientFactory $soapClientFactory): void
    {
        $this->soapClientFactory = $soapClientFactory;
    }

    /**
     * @param array $soapOptions
     */
    public function setSoapOptions(array $soapOptions): void
    {
        $this->soapOptions = $soapOptions;
    }

    /**
     * @return Client
     */
    public function build()
    {
        $soapClientFactory = $this->soapClientFactory ? $this->soapClientFactory : new SoapClientFactory();
        $soapClient = $soapClientFactory->factory(self::WSDL_URL, $this->soapOptions);
        return new Client($soapClient, $this->username, $this->password);
    }
}