<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseFloorTypeEnum;

/**
 * Преобразование поля в HouseFirefightingTypeEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseFloorTypeConverter implements TypeConverterInterface {

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
        return 'HouseFloorType988Enum';
    }

    /**
     * @param string $input
     * @return HouseFloorTypeEnum
     */
    function convertToData(string $input)
    {
        return HouseFloorTypeEnum::byValue($input);
    }

    /**
     * @param HouseFloorTypeEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}