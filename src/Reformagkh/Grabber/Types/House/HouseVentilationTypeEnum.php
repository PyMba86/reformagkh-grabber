<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа системы вентиляции
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseVentilationTypeEnum extends Enum
{
    /**
     * Отсутствует
     */
    const MISSING = "1";

    /**
     * Приточная вентиляция
     */
    const FORCED = "2";

    /**
     * Вытяжная вентиляция
     */
    const EXHAUST = "3";

    /**
     * Приточно-вытяжная вентиляция
     */
    const MIXED = "4";
}