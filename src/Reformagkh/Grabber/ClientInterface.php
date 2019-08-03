<?php

namespace Reformagkh\Grabber;

use Reformagkh\Grabber\Result\RecordIterator;
use Reformagkh\Grabber\Result\RecordPageable;
use Reformagkh\Grabber\Types\Report\ReportingPeriod;

/**
 * Интерфейс описания методов Api в сервисе
 *
 * @package Reformagkh\Grabber
 */
interface ClientInterface
{
    /**
     * Метод выполняет авторизацию внешней системы и открывает сеанс работы.
     *
     * @param string $username Имя пользователя, для ввода в систему.
     * @param string $password Набор символов, для подтверждения личности или полномочий.
     * @return string Токен
     */
    public function login($username, $password): string ;

    /**
     * Метод завершает авторизованный сеанс работы внешней системы.
     *
     * @return void
     */
    public function logout(): void;

    /**
     * Метод возвращает текущий отчетный период в системе.
     *
     * @return ReportingPeriod Отчетный период
     */
    public function getActualReportPeriod(): ReportingPeriod;

    /**
     * Метод возвращает список отчетных периодов системы.
     *
     * @return array Список отчетный периодов
     */
    public function getReportingPeriodList(): array;

    /**
     * Метод получения данных  анкеты (текущей и архивной) управляющей организации по указанному
     * субъекту федерации за указанный отчетный период.
     *
     * @param string $regionId Уникальный идентификатор региона (GUID из ФИАС)
     * @param int $periodId Идентификатор отчетного периода
     * @return RecordIterator Объект итератора
     */
    public function getCompanyProfileList(string $regionId, int $periodId): RecordIterator;

    /**
     * Метод получения данных  анкеты (текущей и архивной) управляющей организации по указанному
     * субъекту федерации за указанный отчетный период.
     *
     * Чтение данных постраничное, на одной странице передаются 100 анкет организаций.
     *
     * @param string $regionId Уникальный идентификатор региона (GUID из ФИАС)
     * @param int $pageNumber Номер страницы
     * @param int $periodId  Идентификатор отчетного периода
     * @return RecordPageable Массив анкет в параметре data
     */
    public function getCompanyProfilePage(string $regionId, int $pageNumber, int $periodId): RecordPageable;

    /**
     * Метод получения данных текущих/архивных анкет дома по указанному субъекту федерации.
     *
     * Чтение данных постраничное, на одной странице передаются 100 анкет домов.
     *
     * @param string $regionId Уникальный идентификатор региона (GUID из ФИАС)
     * @param int $pageNumber Номер страницы
     * @param int $periodId Идентификатор отчетного периода
     * @return RecordPageable Массив анкет в параметре data
     */
    public function getHouseProfilePage(string $regionId, int $pageNumber, int $periodId): RecordPageable;

    /**
     * Метод получения данных текущих/архивных анкет дома по указанному субъекту федерации.
     *
     * @param string $regionId Уникальный идентификатор региона (GUID из ФИАС)
     * @param int $periodId Идентификатор отчетного периода
     * @return RecordIterator Объект итератора
     */
    public function getHouseProfileList(string $regionId, int $periodId): RecordIterator;
}