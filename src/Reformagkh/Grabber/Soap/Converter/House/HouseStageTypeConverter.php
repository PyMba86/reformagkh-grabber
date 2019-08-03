<?php

namespace Reformagkh\Grabber\Soap\Converter\House;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\House\HouseStageEnum;

/**
 * Преобразование поля в HouseStageEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class HouseStageTypeConverter implements TypeConverterInterface {

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
        return 'HouseStageEnum';
    }

    /**
     * @param string $input
     * @return HouseStageEnum
     */
    function convertToData(string $input)
    {
        return HouseStageEnum::byValue($input);
    }

    /**
     * @param HouseStageEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}