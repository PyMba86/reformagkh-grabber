<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseChuteTypeEnum;

/**
 * Преобразование поля в HouseChuteTypeEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseChuteTypeConverter implements TypeConverterInterface {

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
        return 'HouseChuteTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseChuteTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseChuteTypeEnum::byValue($input);
    }

    /**
     * @param HouseChuteTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}