<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа системы водоотведения
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseSewerageTypeEnum extends Enum
{
    /**
     * Отсутствует
     */
    const MISSING = 1;

    /**
     * Центральное
     */
    const CENTRAL = 2;

    /**
     * Автономное
     */
    const STANDALONE = 3;

}