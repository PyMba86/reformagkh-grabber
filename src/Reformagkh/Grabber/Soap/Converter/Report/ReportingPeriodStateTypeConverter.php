<?php

namespace Reformagkh\Grabber\Soap\Converter\Report;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Types\ReportingPeriodStateEnum;

/**
 * Преобразование поля в ReportingPeriodStateEnum
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class ReportingPeriodStateTypeConverter implements TypeConverterInterface {

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
        return 'ReportingPeriodStateEnum';
    }

    /**
     * @param string $input
     * @return ReportingPeriodStateEnum
     */
    function convertToData(string $input)
    {
        return ReportingPeriodStateEnum::byValue($input);
    }

    /**
     * @param ReportingPeriodStateEnum $input
     * @return string
     */
    function convertToString($input): string
    {
        return $input->getValue();
    }


}