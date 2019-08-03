<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор стадия жизненного цикла дома
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseStageEnum extends Enum
{
    /**
     * Используемый
     */
    const EXPLOITED = 1;

    /**
     * Пока не запретили изменение
     */
    const DECOMMISSIONED = 2;

    /**
     * Пока запретили изменение
     */
    const DRIFTING = 3;
}