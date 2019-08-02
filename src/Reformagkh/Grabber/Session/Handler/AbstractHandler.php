<?php

namespace Reformagkh\Grabber\Session\Handler;

use Exception;
use Reformagkh\Grabber\Message\BaseMessage;
use Reformagkh\Grabber\Params\SessionHandlerParams;
use Reformagkh\Grabber\Util\MsgBodyExtractor;
use SoapClient;
use SoapFault;

abstract class AbstractHandler implements HandlerInterface {

    /**
     * @var SoapClient
     */
    protected $soapClient;

    /**
     * @var SessionHandlerParams
     */
    protected $params;

    /**
     * @var MsgBodyExtractor
     */
    protected $extractor;

    /**
     * Стандартные параметры SOAP клиента
     *
     * @var array
     */
    protected $soapClientOptions = [
        'trace' => 1,
        'exceptions' => 1,
        'soap_version' => SOAP_1_1
    ];

    public function __construct(SoapClient $client, SessionHandlerParams $params) {

    }

    /**
     * @param string $messageName
     * @param BaseMessage $messageBody
     * @param array $messageOptions
     * @return SendResult
     * @throws Exception
     */
    public function sendMessage(string $messageName, BaseMessage $messageBody, array $messageOptions): SendResult
    {
        $result = new SendResult();

        $this->prepareForNextMessage($messageName, $messageOptions);

        try {
            $result->responseObject = $this->soapClient->$messageName($messageBody);

            $this->handlePostMessage($messageName, $this->getLastResponse(), $messageOptions, $result);

        } catch (SoapFault $exception) {
            $result->exception = $exception;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $result->responseXml = $this->extractor->extract($this->getLastResponse());

        return $result;

    }

    abstract protected function prepareForNextMessage($messageName, $messageOptions);

    abstract protected function handlePostMessage($messageName, $lastResponse, $messageOptions, $result);

    abstract protected function makeSoapClientOptions();

    protected function executeMethodOnSoapClientForMsg($method)
    {
        $result = null;
        $soapClient = $this->soapClient;
        if ($soapClient instanceof \SoapClient) {
            $result = $soapClient->$method();
        }
        return $result;
    }

    public function getLastRequest($msgName)
    {
        return $this->executeMethodOnSoapClientForMsg(
            '__getLastRequest'
        );
    }

    public function getLastResponse()
    {
        return $this->executeMethodOnSoapClientForMsg(
            '__getLastResponse'
        );
    }

    public function getLastRequestHeaders()
    {
        return $this->executeMethodOnSoapClientForMsg(
            '__getLastRequestHeaders'
        );
    }

    public function getLastResponseHeaders()
    {
        return $this->executeMethodOnSoapClientForMsg(
            '__getLastResponseHeaders'
        );
    }
}
