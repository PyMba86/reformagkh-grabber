<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseDrainageTypeEnum;

/**
 * Преобразование поля в HouseDrainageTypeEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseDrainageTypeConverter implements TypeConverterInterface {

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
        return 'HouseDrainageTypeEnum';
    }

    /**
     * @param string $input
     * @return HouseDrainageTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseDrainageTypeEnum::byValue($input);
    }

    /**
     * @param HouseDrainageTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}