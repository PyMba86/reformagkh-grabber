<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа системы горячего водоснабжения
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseHotWaterTypeEnum extends Enum
{
    /**
     * Отсутствует
     */
    const MISSING = 1;

    /**
     * Центральное (открытая система)
     */
    const CENTRAL_OPENED = 2;

    /**
     * Центральное (закрытая система)
     */
    const CENTRAL_CLOSED = 3;

    /**
     * Автономная котельная (крышная, встроенно-пристроенная)
     */
    const STANDALONE_BOILER = 4;

    /**
     * Квартирное (квартирный котел)
     */
    const ROOM_BOILER = 5;

    /**
     * Печное
     */
    const STOVE = 6;

    /**
     * Индивидуальный тепловой пункт (ИТП)
     */
    const ITP = 7;

}