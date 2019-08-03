<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseElectricalTypeEnum;

/**
 * Преобразование поля в HouseElectricalTypeEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseElectricalTypeConverter implements TypeConverterInterface {

    /**
     * {@inheritdoc}
     */
    public function getTypeNamespace()
    {
        return 'https://api.reformagkh.ru/api';
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeName()
    {
        return 'HouseElectricalTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseElectricalTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseElectricalTypeEnum::byValue($input);
    }

    /**
     * @param HouseElectricalTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}