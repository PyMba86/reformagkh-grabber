<?php

namespace Reformagkh\Grabber\Soap\Format;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;

/**
 * Интерфейс преобразования soap полей
 *
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
interface TypeFormatConverterInterface {

    /**
     * Преобразовать входящую строку к типу
     *
     * @param string $xml XML string
     *
     * @param TypeConverterInterface $converter
     * @return mixed
     */
    function fromXml(string $xml, TypeConverterInterface $converter);

    /**
     * Преобразовать входящий тип к строке
     *
     * @param $input
     * @param TypeConverterInterface $converter
     * @return string
     */
    function toXml($input, TypeConverterInterface $converter);
}