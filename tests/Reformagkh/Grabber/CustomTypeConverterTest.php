<?php

namespace Reformagkh\Grabber;

use PHPUnit\Framework\TestCase;
use Reformagkh\Grabber\Soap\Converter\Common\DateTimeTypeConverter;
use Reformagkh\Grabber\Soap\Converter\Common\DateTypeConverter;
use Reformagkh\Grabber\Soap\SoapClientFactory;
use Reformagkh\Grabber\Soap\TypeConverterCollection;

class CustomTypeConverterTest extends TestCase
{

    /**
     * @var Client
     */
    protected $client;

    protected function setUp(): void
    {
        $builder = new ClientBuilder('viadmhmao', '02dc030');

        $soapClientFactory = new SoapClientFactory();
        $soapClientFactory->setTypeConverters(new TypeConverterCollection(
            array (
                new DateTimeTypeConverter(),
                new DateTypeConverter(),
            )
        ));

        $this->client = $builder
            ->setSoapClientFactory($soapClientFactory)
            ->build();
    }

    /**
     * @throws \SoapFault
     */
    public function testGetActualPeriodClient()
    {
        // Получить период отчетный последний
        $result = $this->client->getActualReportPeriod();
        $this->assertEquals(1, $result->state);
        $this->assertNotEmpty($result->id);
        $this->assertNotEmpty($result);
    }

    public function testGetHouseProfileList()
    {
        // Получить список организаций с пагинацией
        $result = $this->client->getHouseProfileList(
            'd66e5325-3a25-4d29-ba86-4ca351d9704b',
            465
        );

        $maxCount = 100;
        $currentCount = 0;

        foreach ($result as $item) {
            $currentCount++;
            echo $item->house_profile_data->house_type . "\n";
            if ($currentCount > $maxCount) {
                break;
            }
        }

        $this->assertNotEmpty($result);
    }

}