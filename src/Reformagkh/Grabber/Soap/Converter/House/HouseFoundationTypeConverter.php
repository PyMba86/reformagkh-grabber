<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseFoundationTypeEnum;

/**
 * Преобразование поля в HouseFoundationTypeEnum
 * @package Reformagkh\Grabber\Soap\Converter\House
 */
class HouseFoundationTypeConverter implements TypeConverterInterface {

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
        return 'HouseFoundationTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseFoundationTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseFoundationTypeEnum::byValue(intval($input));
    }

    /**
     * @param HouseFoundationTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}