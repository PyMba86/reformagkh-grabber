<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа системы пожаротушения
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseFirefightingTypeEnum extends Enum
{
    /**
     * Отсутствует
     */
    const MISSING = "1";

    /**
     * Автоматическая
     */
    const AUTOMATIC = "2";

    /**
     * Пожарные гидранты
     */
    const FIRE_HYDRANTS = "3";

    /**
     * Пожарный кран
     */
    const FIRE_CRANE = "4";
}