<?php

namespace Reformagkh\Grabber\Params;

class LoadParamsFromArray
{

    /**
     * Построить обьект параметров запроса с помощью ассоциативного массива
     * @param array $params Параметры инциализации
     */
    public function __construct($params = [])
    {
        foreach ($params as $propName => $propValue) {
            if (property_exists($this, $propName)) {
                $this->$propName = $propValue;
            }
        }
        //TODO Должна еще быть поддержка построения с помощью обьектов
    }
}
