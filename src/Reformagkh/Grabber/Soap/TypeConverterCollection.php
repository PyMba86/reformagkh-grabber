<?php

namespace Reformagkh\Grabber\Soap;

use Reformagkh\Grabber\Soap\Converter\TypeConverterInterface;
use Reformagkh\Grabber\Soap\Format\TypeFormatConverterInterface;

/**
 * Коллекция преобразователей типов
 */
class TypeConverterCollection
{
    /**
     * Список конвертируемых полей
     *
     * @var TypeConverterInterface[]
     */
    protected $converters = array();

    /**
     * @param array $converters
     */
    public function __construct(array $converters = array())
    {
        foreach ($converters as $converter) {
            $this->add($converter);
        }
    }

    /**
     * Добавить конвертер типов в коллекцию
     *
     * @param TypeConverterInterface $converter
     * @return TypeConverterCollection
     * @throws \InvalidArgumentException
     */
    public function add(TypeConverterInterface $converter)
    {
        if ($this->has($converter->getTypeNamespace(), $converter->getTypeName())) {
            throw new \InvalidArgumentException(
                'Converter for this type already exists'
            );
        }
        return $this->set($converter);
    }

    /**
     * Установить (перезаписать) конвертер типов в коллекции
     *
     * @param TypeConverterInterface $converter
     * @return TypeConverterCollection
     */
    public function set(TypeConverterInterface $converter)
    {
        $this->converters[$converter->getTypeNamespace() . ':'
        . $converter->getTypeName()] = $converter;
        return $this;
    }

    /**
     * Возвращает true, если коллекция содержит конвертер типов для определенного
     * пространства имен и имени
     *
     * @param string $namespace Converter namespace
     * @param string $name Converter name
     * @return boolean
     */
    public function has($namespace, $name)
    {
        if (isset($this->converters[$namespace . ':' . $name])) {
            return true;
        }
        return false;
    }

    /**
     * Получить коллекцию как typemap, которую можно использовать в SoapClient
     *
     * @param TypeFormatConverterInterface $formatConverter
     * @return array
     */
    public function getTypemap(TypeFormatConverterInterface $formatConverter)
    {
        $typemap = array();
        foreach ($this->converters as $converter) {
            $typemap[] = array(
                'type_name' => $converter->getTypeName(),
                'type_ns' => $converter->getTypeNamespace(),
                'from_xml' => function ($input) use ($converter, $formatConverter) {
                    return $formatConverter->fromXml($input, $converter);
                },
                'to_xml' => function ($input) use ($converter, $formatConverter) {
                    return $formatConverter->toXml($input, $converter);
                },
            );
        }
        return $typemap;
    }
}
