<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа перекрытий
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseFloorTypeEnum extends Enum
{
    /**
     * Используемый
     */
    const NO_DATA = 1;

    /**
     * Железобетонные
     */
    const REINFORCED = 2;

    /**
     * Деревянные
     */
    const WOODEN = 3;

    /**
     * Смешанные
     */
    const MIXED = 4;
}