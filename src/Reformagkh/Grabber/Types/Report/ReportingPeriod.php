<?php

namespace Reformagkh\Grabber\Types\Report;

use DateTime;

/**
 * Отчетный период
 *
 * @package Reformagkh\Grabber\Types
 */
class ReportingPeriod {

    /**
     * @var int
     */
    public $id;

    /**
     * @var DateTime
     */
    public $date_start;

    /**
     * @var DateTime
     */
    public $date_end;

    /**
     * @var string
     */
    public $name;

    /**
     * @var ReportingPeriodStateEnum
     */
    public $state;

    /**
     * @var boolean
     */
    public $is_988;
}