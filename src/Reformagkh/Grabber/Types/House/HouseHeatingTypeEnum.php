<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа системы теплоснабжения
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseHeatingTypeEnum extends Enum
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
     * Автономная котельная (крышная, встроенно-пристроенная)
     */
    const STANDALONE_BOLIER = 3;

    /**
     * Квартирное отопление (квартирный котел)
     */
    const ROOM_BOLIER = 4;

    /**
     * Печное
     */
    const STOVE = "5";

    /**
     * Электроотопление
     */
    const ELECTRIC = 6;

    /**
     * Индивидуальный тепловой пункт (ИТП)
     */
    const ITP = 7;

    /**
     * Газовая колонка
     */
    const GAS = 8;

}