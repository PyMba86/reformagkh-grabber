<?php

namespace Reformagkh\Grabber;

use Reformagkh\Grabber\Result\RecordIterator;
use Reformagkh\Grabber\Result\RecordPageable;
use Reformagkh\Grabber\Soap\SoapClient;
use Reformagkh\Grabber\Types\FiasAddress;
use Reformagkh\Grabber\Types\Report\ReportingPeriod;
use Reformagkh\Grabber\Types\Report\ReportingPeriodStateEnum;
use SoapHeader;

/**
 * @package Reformagkh\Grabber
 */
class Client implements ClientInterface
{

    /**
     * SOAP namespace
     * @var string
     */
    const SOAP_NAMESPACE = 'http://www.w3.org/2001/XMLSchema';

    /**
     * SOAP session header
     * @var SoapHeader
     */
    protected $sessionHeader;

    /**
     * PHP SOAP client
     *
     * @var SoapClient
     */
    protected $soapClient;

    /**
     * @var string
     */
    protected $username;
    /**
     * @var string
     */
    protected $password;

    /**
     * Type collection as derived from the WSDL
     *
     * @var array
     */
    protected $types = array();
    /**
     * Token
     *
     * @var string
     */
    protected $token;


    public function __construct(SoapClient $soapClient, $username, $password)
    {
        $this->soapClient = $soapClient;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @param string $regionId
     * @param int $pageNumber
     * @param int $periodId
     * @return array | RecordPageable
     * @throws \SoapFault
     */
    public function getHouseProfilePage(string $regionId, int $pageNumber, int $periodId): RecordPageable
    {
        return $this->call('GetHouseProfileSF988',
            array(
                'region_id' => $regionId,
                'page_number' => $pageNumber,
                'reporting_period_id' => $periodId
            ));
    }

    /**
     * @param string $regionId
     * @param int $periodId
     * @return Result\RecordIterator
     */
    public function getHouseProfileList(string $regionId, int $periodId): RecordIterator
    {
        return new RecordIterator($this,
            function (int $currentPage) use ($regionId, $periodId) {
                return $this->getHouseProfilePage($regionId, $currentPage, $periodId);
            }, 1);
    }

    /**
     * @param string $regionId
     * @param int $pageNumber
     * @param int $periodId
     * @return array | RecordPageable
     * @throws \SoapFault
     */
    public function getCompanyProfilePage(string $regionId, int $pageNumber, int $periodId): RecordPageable
    {
        return $this->call('GetCompanyProfileSF988',
            array(
                'region_id' => $regionId,
                'page_number' => $pageNumber,
                'reporting_period_id' => $periodId
            ));
    }

    /**
     * @param int $houseId
     * @param string $houseGuid
     * @return array
     * @throws \SoapFault
     */
    public function getHouseProfileActual(int $houseId, string $houseGuid): array
    {
        return $this->call('GetHouseProfileActual',
            array(
                'house_id' => $houseId,
                'houseguid' => $houseGuid
            ));
    }

    /**
     * @param FiasAddress $address
     * @return array
     * @throws \SoapFault
     */
    public function getHouseInfo(FiasAddress $address): array
    {
        return $this->call('GetHouseInfo',
            array(
                'address' => $address
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getCompanyProfileList(string $regionId, int $periodId): RecordIterator
    {
        return new RecordIterator($this,
            function (int $currentPage) use ($regionId, $periodId) {
                return $this->getCompanyProfilePage($regionId, $currentPage, $periodId);
            }, 1);
    }

    /**
     * {@inheritdoc}
     * @throws \SoapFault
     */
    public function getReportingPeriodList(): array
    {
        return $this->call('GetReportingPeriodList');
    }

    /**
     * {@inheritdoc}
     * @throws \SoapFault
     */
    public function getActualReportPeriod(): ReportingPeriod
    {
        $list = $this->getReportingPeriodList();
        return current(array_filter($list, function (ReportingPeriod $period) {
            $state = ReportingPeriodStateEnum::get($period->state);
            return ($state->is(ReportingPeriodStateEnum::CURRENT));
        }));
    }

    /**
     * @param $username
     * @param $password
     * @return string
     */
    protected function doLogin($username, $password)
    {
        $result = $this->soapClient->__soapCall('Login',
            array(
                'login' => $username,
                'password' => $password
            )
        );
        $this->setToken($result);
        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function login($username, $password): string
    {
        return $this->doLogin($username, $password);
    }

    /**
     * Получить токен
     *
     * @return string
     */
    public function getToken()
    {
        if (null === $this->token) {
            $this->login($this->username, $this->password);
        }
        return $this->token;
    }

    /**
     * {@inheritdoc}
     * @throws \SoapFault
     */
    public function logout(): void
    {
        $this->call('Logout');
        $this->sessionHeader = null;
    }

    /**
     * @param string $method
     * @param array $params
     * @return array
     * @throws \SoapFault
     */
    protected function call(string $method, array $params = array())
    {
        $this->init();

        $this->soapClient->__setSoapHeaders($this->getSessionHeader());

        try {
            $result = $this->soapClient->__soapCall($method, $params);
        } catch (\SoapFault $soapFault) {
            throw $soapFault;
        }

        return $result;
    }

    protected function init()
    {
        if (!$this->getSessionHeader()) {
            $this->doLogin($this->username, $this->password);
        }
    }

    /**
     * Set soap headers
     *
     * @param array $headers
     */
    protected function setSoapHeaders(array $headers)
    {
        $soapHeaderObjects = array();
        foreach ($headers as $key => $value) {
            $soapHeaderObjects[] = new SoapHeader(self::SOAP_NAMESPACE, $key, $value);
        }
        $this->soapClient->__setSoapHeaders($soapHeaderObjects);
    }

    /**
     * Get session header
     *
     * @return SoapHeader
     */
    protected function getSessionHeader()
    {
        return $this->sessionHeader;
    }

    protected function setToken(string $token)
    {
        $this->token = $token;
        $this->sessionHeader = new SoapHeader(
            self::SOAP_NAMESPACE,
            'authenticate', $token);
    }
}
