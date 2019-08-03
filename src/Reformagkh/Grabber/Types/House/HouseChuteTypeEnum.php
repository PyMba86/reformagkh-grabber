<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа мусоропровода
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseChuteTypeEnum extends Enum
{
    /**
     * Отсутствует
     */
    const MISSING = 1;

    /**
     * Квартирные
     */
    const ROOMS = 2;

    /**
     * На лестничной клетке
     */
    const STAIRWELL = 3;

    /**
     * Сухой (холодный)
     */
    const DRY_COLD = 4;

    /**
     * Сухой
     */
    const DRY = 5;

    /**
     * Холодный
     */
    const COLD = 6;

    /**
     * Огневой (горячий)
     */
    const FIRE = 7;

    /**
     * Мокрый
     */
    const WET = 8;
}