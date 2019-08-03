<?php

namespace Reformagkh\Grabber\Soap\Converter\Common;

use DateTime;
use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;

/**
 * Преобразование поля в Date
 * @package Reformagkh\Grabber\Soap\Converter\Common
 */
class DateTypeConverter implements TypeConverterInterface {

    /**
     * {@inheritdoc}
     */
    public function getTypeNamespace()
    {
        return 'http://www.w3.org/2001/XMLSchema';
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeName()
    {
        return 'date';
    }

    /**
     * @param string $input
     * @return DateTime|mixed
     * @throws \Exception
     */
    function convertToData(string $input)
    {
        return new DateTime($input);
    }

    /**
     * @param DateTime $input
     * @return string
     */
    function convertToString($input): string
    {
       return $input->format('Y-m-d');
    }
}