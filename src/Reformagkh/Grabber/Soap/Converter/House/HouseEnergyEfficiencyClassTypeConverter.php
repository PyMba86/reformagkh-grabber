<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseEnergyEfficiencyClassEnum;

/**
 * Преобразование поля в HouseEnergyEfficiencyClassEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseEnergyEfficiencyClassTypeConverter implements TypeConverterInterface {

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
        return 'HouseEnergyEfficiencyClass988Enum';
    }

    /**
     * @param string $input
     * @return HouseEnergyEfficiencyClassEnum
     */
    function convertToData(string $input)
    {
        return HouseEnergyEfficiencyClassEnum::byValue($input);
    }

    /**
     * @param HouseEnergyEfficiencyClassEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}