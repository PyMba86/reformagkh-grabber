<?php

namespace Reformagkh\Grabber\Soap\Converter;

/**
 * Преобразователь типов преобразует между типами SOAP и PHP
 */
interface TypeConverterInterface
{
    /**
     * Get type namespace.
     *
     * @return string
     */
    function getTypeNamespace();
    /**
     * Get type name.
     *
     * @return string
     */
    function getTypeName();

    /**
     * Конвертирует входящий параметр к типу, соответсвующему данному полю.
     *
     * @param string $input
     *
     * @return mixed
     */
    function convertToData(string $input);

    /**
     * Конвертирует входящий параметр к строке, для записи в БД.
     *
     * @param mixed $input
     *
     * @return string
     */
    function convertToString($input): string;
}