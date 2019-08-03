<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор класса энергоэффективности
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseEnergyEfficiencyClassEnum extends Enum
{
    /**
     * Нет данных
     */
    const NO_DATA = 1;

    /**
     * Не присвоен
     */
    const NOT_ASSIGNED = 2;

    /**
     * A
     */
    const A = 3;

    /**
     * B
     */
    const B = 4;

    /**
     * B+
     */
    const BPlus = 5;

    /**
     * B++
     */
    const BPlusPlus = 6;

    /**
     * C
     */
    const C = 7;

    /**
     * D
     */
    const D = 8;

    /**
     * E
     */
    const E = 9;

    /**
     * Нет в документации, но есть в системе
     */
    const NOT_IMPLEMENTED_10 = 10;

    /**
     * Нет в документации, но есть в системе
     */
    const NOT_IMPLEMENTED_11 = 11;
}