<?php

namespace Reformagkh\Grabber\Types\House;

use MabeEnum\Enum;

/**
 * Идентификатор типа жилого дома
 *
 * @package Reformagkh\Grabber\Types\House
 */
class HouseTypeEnum extends Enum
{
    /**
     * Общежитие
     */
    const HOSTEL = "1";

    /**
     * Объект индивидуального жилищного строительства
     */
    const INDIVIDUAL_OBJECT = "2";

    /**
     * Жилой дом блокированной застройки
     */
    const HOUSE = "3";

    /**
     * Многоквартирный дом
     */
    const APARTMENT_HOUSE = "4";
}