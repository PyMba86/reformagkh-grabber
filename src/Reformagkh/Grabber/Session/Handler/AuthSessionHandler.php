<?php

namespace Reformagkh\Grabber\Session\Handler;

use SoapHeader;

class AuthSessionHandler extends AbstractHandler
{

    /**
     * @var string
     */
    const SESSION_NS = '';

    /**
     * @var string
     */
    const NODENAME_AUTH = 'authenticate';

    /**
     * @var bool
     */
    protected $isAuthenticated = false;

    /**
     * @var string
     */
    protected $token;

    /**
     * @param $messageName
     * @param $messageOptions
     * @throws InvalidSessionException
     */
    protected function prepareForNextMessage($messageName, $messageOptions)
    {
        if (!$this->isAuthenticated && $messageName !== 'Login') {
            throw new InvalidSessionException('No active session');
        }

        $this->soapClient->__setSoapHeaders(null);

        if ($this->isAuthenticated === true && $this->token) {
            $this->soapClient->__setSoapHeaders(
                new SoapHeader(self::SESSION_NS, self::NODENAME_AUTH, $this->token)
            );
        }
    }

    protected function handlePostMessage($messageName, $lastResponse, $messageOptions, $result)
    {
        if ($messageName === 'Login') {
            $this->token = $this->getSessionTokenFromHeader($lastResponse);
            $this->isAuthenticated = (!empty($this->token));
        }
    }

    protected function getSessionTokenFromHeader($responseMessage)
    {
        $sessionToken = null;

        $responseDomDoc = new \DOMDocument('1.0', 'UTF-8');
        $ok = $responseDomDoc->loadXML($responseMessage);

        if ($ok) {
            $sessionToken = $responseDomDoc->getElementsByTagName(self::NODENAME_AUTH)->item(0)->nodeValue;
        }

        unset($responseDomDoc);

        return $sessionToken;
    }

    /**
     * @param $stateful
     * @throws UnsupportedOperationException
     */
    public function setStateful($stateful): void
    {
        if ($stateful === false) {
            throw new UnsupportedOperationException('Stateful messages are mandatory on SoapHeader');
        }
    }

    public function isStateful()
    {
        return true;
    }

    protected function makeSoapClientOptions()
    {
        $options = $this->soapClientOptions;
        $options['classmap'] = array_merge(Classmap::$soapheader, Classmap::$map);
        if (!empty($this->params->soapClientOptions)) {
            $options = array_merge($options, $this->params->soapClientOptions);
        }
        return $options;
    }


}
