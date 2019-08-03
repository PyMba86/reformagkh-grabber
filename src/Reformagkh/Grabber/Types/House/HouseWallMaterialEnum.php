<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор материала несущих стен
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseWallMaterialEnum extends Enum
{
    /**
     * Нет данных
     */
    const NO_DATA = "1";

    /**
     * Каменные, кирпичные
     */
    const STONE = "2";

    /**
     * Панельные
     */
    const PANEL = "3";

    /**
     * Блочные
     */
    const BLOCKY = "4";

    /**
     * Смешанные
     */
    const MIXED = "5";

    /**
     * Монолитные
     */
    const MONOLITHIC = "6";

    /**
     * Деревянные
     */
    const WOODEN = "7";

    /**
     * Прочие
     */
    const OTHER = "8";

}