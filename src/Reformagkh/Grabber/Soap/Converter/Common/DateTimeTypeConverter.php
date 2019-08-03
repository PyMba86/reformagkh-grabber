<?php

namespace Reformagkh\Grabber\Soap\Converter\Common;

use DateTime;
use DateTimeZone;
use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;

/**
 * Преобразование поля в DateTime
 * @package Reformagkh\Grabber\Soap\Converter\Common
 */
class DateTimeTypeConverter implements TypeConverterInterface {

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
        return 'dateTime';
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    function convertToData(string $input)
    {
        $dateTime = new DateTime($input);
        $dateTime->setTimezone(new DateTimeZone(date_default_timezone_get()));
        return $dateTime;
    }

    /**
     * {@inheritdoc}
     * @param DateTime $input
     */
    function convertToString($input): string
    {
       return $input->format('Y-m-d\TH:i:sP');
    }
}