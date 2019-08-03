<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseTypeEnum;

/**
 * Преобразование поля в HouseTypeEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseTypeConverter implements TypeConverterInterface {

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
        return 'HouseType988Enum';
    }

    /**
     * @param string $input
     * @return HouseTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseTypeEnum::byValue($input);
    }

    /**
     * @param HouseTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}