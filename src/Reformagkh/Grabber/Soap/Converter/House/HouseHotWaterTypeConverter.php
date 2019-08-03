<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseHotWaterTypeEnum;

/**
 * Преобразование поля в HouseHotWaterTypeEnum
 * @package Reformagkh\Grabber\Soap\Converter\House
 */
class HouseHotWaterTypeConverter implements TypeConverterInterface {

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
        return 'HouseHotWaterTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseHotWaterTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseHotWaterTypeEnum::byValue(intval($input));
    }

    /**
     * @param HouseHotWaterTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}