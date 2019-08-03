<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseColdWaterTypeEnum;

/**
 * Преобразование поля в HouseColdWaterTypeEnum
 * @package Reformagkh\Grabber\Soap\Converter\House
 */
class HouseColdWaterTypeConverter implements TypeConverterInterface {

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
        return 'HouseColdWaterTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseColdWaterTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseColdWaterTypeEnum::byValue(intval($input));
    }

    /**
     * @param HouseColdWaterTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}