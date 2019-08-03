<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа системы водостоков
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseDrainageTypeEnum extends Enum
{
    /**
     * Отсутствует
     */
    const MISSING = 1;

    /**
     * Наружные водостоки
     */
    const OUTDOOR = 2;

    /**
     * Внутренние водостоки
     */
    const INLAND = 3;

    /**
     * Смешанные
     */
    const MIXED = 4;
}