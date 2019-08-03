<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseFirefightingTypeEnum;

/**
 * Преобразование поля в HouseFirefightingTypeEnum
 * @package Reformagkh\Grabber\Soap\Converter\House
 */
class HouseFirefightingTypeConverter implements TypeConverterInterface {

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
        return 'HouseFirefightingTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseFirefightingTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseFirefightingTypeEnum::byValue(intval($input));
    }

    /**
     * @param HouseFirefightingTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}