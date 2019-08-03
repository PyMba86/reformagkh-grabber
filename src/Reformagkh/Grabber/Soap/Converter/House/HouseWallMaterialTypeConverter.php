<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseWallMaterialEnum;

/**
 * Преобразование поля в HouseWallMaterialEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseWallMaterialTypeConverter implements TypeConverterInterface {

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
        return 'HouseWallMaterial988Enum';
    }

    /**
     * @param string $input
     * @return HouseWallMaterialEnum
     */
    function convertToData(string $input)
    {
        return HouseWallMaterialEnum::byValue($input);
    }

    /**
     * @param HouseWallMaterialEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}