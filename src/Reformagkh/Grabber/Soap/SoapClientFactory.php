<?php

namespace Reformagkh\Grabber\Soap;

use Reformagkh\Grabber\Soap\Format\TypeFormatConverterInterface;

class SoapClientFactory
{
    /**
     * Classmap
     *
     * @var array
     */
    protected $classmap = array(

        // Response
        'GetCompanyProfileSF988Response' => 'Reformagkh\Grabber\Result\RecordPageable',
        'GetHouseProfileSF988Response' => 'Reformagkh\Grabber\Result\RecordPageable',

        // Report
        'ReportingPeriod' => 'Reformagkh\Grabber\Types\Report\ReportingPeriod',
        'ReportingPeriodStateEnum' => 'Reformagkh\Grabber\Types\Report\ReportingPeriodStateEnum',

        // House
        'HouseChuteTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseChuteTypeEnum',
        'HouseColdWaterTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseColdWaterTypeEnum',
        'HouseDrainageTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseDrainageTypeEnum',
        'HouseElectricalTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseElectricalTypeEnum',
        'HouseEnergyEfficiencyClassEnum' => 'Reformagkh\Grabber\Types\House\HouseEnergyEfficiencyClassEnum',
        'HouseFirefightingTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseFirefightingTypeEnum',
        'HouseFloorTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseFloorTypeEnum',
        'HouseFoundationTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseFoundationTypeEnum',
        'HouseGasTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseGasTypeEnum',
        'HouseHeatingTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseHeatingTypeEnum',
        'HouseHotWaterTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseHotWaterTypeEnum',
        'HouseSewerageTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseSewerageTypeEnum',
        'HouseStageEnum' => 'Reformagkh\Grabber\Types\House\HouseStageEnum',
        'HouseTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseTypeEnum',
        'HouseVentilationTypeEnum' => 'Reformagkh\Grabber\Types\House\HouseVentilationTypeEnum',
        'HouseWallMaterialEnum' => 'Reformagkh\Grabber\Types\House\HouseWallMaterialEnum',
    );

    /**
     * @var TypeConverterCollection
     */
    protected $typeConverters;

    /**
     * @var TypeFormatConverterInterface
     */
    protected $typeFormatConverter;

    /**
     * Построить клиента
     *
     * @param string $wsdl
     * @param array $soapOptions
     * @return SoapClient
     */
    public function factory($wsdl, array $soapOptions = array())
    {
        $defaults = array(
            'trace' => 1,
            'features' => \SOAP_SINGLE_ELEMENT_ARRAYS,
            'classmap' => $this->classmap,
            'typemap' => $this->getTypeConverters()->getTypemap($this->getTypeFormatConverter()),
            'cache_wsdl' => \WSDL_CACHE_MEMORY
        );
        $options = array_merge($defaults, $soapOptions);
        return new SoapClient($wsdl, $options);
    }

    /**
     * Получить коллекцию конвертеров типов, которые будут использователься в клиенте
     *
     * @return TypeConverterCollection
     */
    public function getTypeConverters()
    {
        if (null === $this->typeConverters) {
            $this->typeConverters = new TypeConverterCollection(
                array(

                    // Common
                    new Converter\Common\DateTimeTypeConverter(),
                    new Converter\Common\DateTypeConverter(),

                    // Report
                    new Converter\Report\ReportingPeriodStateTypeConverter(),

                    // House
                    new Converter\House\HouseChuteTypeConverter(),
                    new Converter\House\HouseColdWaterTypeConverter(),
                    new Converter\House\HouseDrainageTypeConverter(),
                    new Converter\House\HouseElectricalTypeConverter(),
                    new Converter\House\HouseEnergyEfficiencyClassTypeConverter(),
                    new Converter\House\HouseFirefightingTypeConverter(),
                    new Converter\House\HouseFloorTypeConverter(),
                    new Converter\House\HouseFoundationTypeConverter(),
                    new Converter\House\HouseGasTypeConverter(),
                    new Converter\House\HouseHeatingTypeConverter(),
                    new Converter\House\HouseHotWaterTypeConverter(),
                    new Converter\House\HouseSewerageTypeConverter(),
                    new Converter\House\HouseStageTypeConverter(),
                    new Converter\House\HouseTypeConverter(),
                    new Converter\House\HouseVentilationTypeConverter(),
                    new Converter\House\HouseWallMaterialTypeConverter()
                )
            );
        }
        return $this->typeConverters;
    }

    /**
     * Установить коллекцию контвертеров
     *
     * @param TypeConverterCollection $typeConverters
     * @return SoapClientFactory
     */
    public function setTypeConverters(TypeConverterCollection $typeConverters)
    {
        $this->typeConverters = $typeConverters;
        return $this;
    }

    /**
     * Получить объект, который преобразует типы soap полей
     *
     * @return TypeFormatConverterInterface
     */
    public function getTypeFormatConverter(): TypeFormatConverterInterface
    {
        if (null === $this->typeFormatConverter) {
            $this->typeFormatConverter = new Format\XmlTypeFormatConverter();
        }
        return $this->typeFormatConverter;
    }

    /**
     * Установить объект, который будет трансформировать soap поля
     *
     * @param TypeFormatConverterInterface $typeFormatConverter
     * @return SoapClientFactory
     */
    public function setTypeFormatConverter(TypeFormatConverterInterface $typeFormatConverter)
    {
        $this->typeFormatConverter = $typeFormatConverter;
        return $this;
    }

    /**
     * @return array
     */
    public function getClassmap(): array
    {
        return $this->classmap;
    }

    /**
     * @param array $classmap
     */
    public function setClassmap(array $classmap): void
    {
        $this->classmap = $classmap;
    }
}