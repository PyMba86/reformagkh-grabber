<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseGasTypeEnum;

/**
 * Преобразование поля в HouseGasTypeEnum
 * @package Reformagkh\Grabber\Soap\Converter\House
 */
class HouseGasTypeConverter implements TypeConverterInterface {

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
        return 'HouseGasTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseGasTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseGasTypeEnum::byValue(intval($input));
    }

    /**
     * @param HouseGasTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}