<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа системы электроснабжения
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseElectricalTypeEnum extends Enum
{
    /**
     * Отсутствует
     */
    const MISSING = "1";

    /**
     * Центральное
     */
    const CENTRAL = "2";

    /**
     * Комбинированное
     */
    const COMBINED = "3";
}