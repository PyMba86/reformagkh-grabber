<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseSewerageTypeEnum;

/**
 * Преобразование поля в HouseSewerageTypeEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseSewerageTypeConverter implements TypeConverterInterface {

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
        return 'HouseSewerageTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseSewerageTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseSewerageTypeEnum::byValue($input);
    }

    /**
     * @param HouseSewerageTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}