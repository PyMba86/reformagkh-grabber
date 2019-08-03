<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseHeatingTypeEnum;

/**
 * Преобразование поля в HouseHeatingTypeEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseHeatingTypeConverter implements TypeConverterInterface {

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
        return 'HouseHeatingTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseHeatingTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseHeatingTypeEnum::byValue($input);
    }

    /**
     * @param HouseHeatingTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}