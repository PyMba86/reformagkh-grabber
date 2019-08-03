<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа фундамента
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseFoundationTypeEnum extends Enum
{
    /**
     * Ленточный
     */
    const TAPE = 1;

    /**
     * Бетонные столбы
     */
    const CONCRETE_PILLARS = 2;

    /**
     * Свайный
     */
    const PILE = 3;

    /**
     * Иной
     */
    const OTHER = 4;

    /**
     * Столбчатый
     */
    const COLUMNAR = 5;

    /**
     * Сплошной
     */
    const SOLID = 6;

    /**
     * Сборный
     */
    const COLLECTING = 7;

    /**
     * Отсутствует
     */
    const MISSING = 8;

    /**
     * Комбинированный
     */
    const COMBINED = 9;
}