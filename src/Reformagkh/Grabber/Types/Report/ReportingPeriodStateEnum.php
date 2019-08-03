<?php

namespace Reformagkh\Grabber\Types\Report;

use MabeEnum\Enum;

/**
 * Текущее состояние отчетного периода системы
 *
 * @package Reformagkh\Grabber\Types\Report
 */
class ReportingPeriodStateEnum extends Enum
{
    /**
     * Текущий статус
     */
    const CURRENT = 1;

    /**
     *  Архивный статус
     */
    const ARCHIVE = 2;
}