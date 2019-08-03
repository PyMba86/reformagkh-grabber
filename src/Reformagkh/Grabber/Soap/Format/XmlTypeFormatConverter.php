<?php

namespace Reformagkh\Grabber\Soap\Format;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;

/**
 * Класс преобразования данных XML полей
 *
 * @package Reformagkh\Grabber\Soap\TypeConverter
 */
class XmlTypeFormatConverter implements TypeFormatConverterInterface
{
    /**
     * {@inheritdoc}
     */
    public final function fromXml(string $data, TypeConverterInterface $converter)
    {
        $doc = new \DOMDocument();
        $doc->loadXML($data);
        return '' !== $doc->textContent ? $converter->convertToData($doc->textContent) : null;
    }

    /**
     * {@inheritdoc}
     */
    public final function toXml($data, TypeConverterInterface $converter)
    {
        return sprintf('<%1$s>%2$s</%1$s>',
            $converter->getTypeName(),
            $converter->convertToString($data));
    }

}