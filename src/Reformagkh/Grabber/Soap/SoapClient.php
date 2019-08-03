<?php

namespace Reformagkh\Grabber\Soap;

class SoapClient extends \SoapClient
{
    /**
     * SOAP типы, полученные из WSDL
     *
     * @var array
     */
    protected $types;

    /**
     * Получить SOAP типы из WSDL и проанализировать их
     *
     * @return array Массив типов и их свойств
     */
    public function getSoapTypes()
    {
        if (null === $this->types) {
            $soapTypes = $this->__getTypes();
            foreach ($soapTypes as $soapType) {
                $properties = array();
                $lines = explode("\n", $soapType);
                if (!preg_match('/struct (.*) {/', $lines[0], $matches)) {
                    continue;
                }
                $typeName = $matches[1];
                foreach (array_slice($lines, 1) as $line) {
                    if ($line == '}') {
                        continue;
                    }
                    preg_match('/\s* (.*) (.*);/', $line, $matches);
                    $properties[$matches[2]] = $matches[1];
                }

                $this->types[$typeName] = $properties;
            }
        }
        return $this->types;
    }

    /**
     * Получить комплексные элементы типа SOAP
     *
     * @param string $complexType
     * @return array
     */
    public function getSoapElements($complexType)
    {
        $types = $this->getSoapTypes();
        if (isset($types[$complexType])) {
            return $types[$complexType];
        }

        return array();
    }

    /**
     * Получить SOAP элементы
     *
     * @param string $complexType
     * @param string $element
     *
     * @return string
     */
    public function getSoapElementType($complexType, $element)
    {
        $elements = $this->getSoapElements($complexType);
        if ($elements && isset($elements[$element])) {
            return $elements[$element];
        }

        return null;
    }
}