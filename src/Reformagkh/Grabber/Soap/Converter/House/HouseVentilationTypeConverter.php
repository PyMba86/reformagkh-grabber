<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseVentilationTypeEnum;

/**
 * Преобразование поля в HouseVentilationTypeEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseVentilationTypeConverter implements TypeConverterInterface {

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
        return 'HouseVentilationTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseVentilationTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseVentilationTypeEnum::byValue($input);
    }

    /**
     * @param HouseVentilationTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}