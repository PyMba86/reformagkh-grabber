# Интеграция с Реформа ЖКХ

Данные по новым формам раскрытия информации, согласно Постановлению Правительства РФ № 988 от 27.09.2014
с сайта Реформа ЖКХ (http://www.reformagkh.ru) по указанному субъекту федерации за указанный отчетный период.

Доступные методы (описание методов представлены в ClientInterface):

- login
- logout
- getActualReportPeriod
- getReportingPeriodList
- getCompanyProfileList
- getCompanyProfilePage
- getHouseProfilePage
- getHouseProfileList

## Настройка клиента

Пример настройки клиента с полной поддержкой коллекции преобразователей типов 

````php
<?php
use Reformagkh\Grabber\ClientBuilder;

$builder = new ClientBuilder(
            'login', // Логин пользователя 
            'password' // Пароль пользователя
            );

$this->client = $builder->build();

````

### Коллекция преобразователей типов

Под коллекцией преобразователей типов подразумевается список преобразователей,
которые при получении ответа трансформируют значения полей. 

Для настройки или отключения преобразователей необходимо передать SoapClientFactory в ClientBuilder
перед созданием клиента (метод build)

#### Настройка списка преобразователей типов

````php
<?php
use Reformagkh\Grabber\ClientBuilder;
use Reformagkh\Grabber\Soap\SoapClientFactory;
use Reformagkh\Grabber\Soap\TypeConverterCollection;
use Reformagkh\Grabber\Soap\Converter\Common\DateTimeTypeConverter;
use Reformagkh\Grabber\Soap\Converter\Common\DateTypeConverter;

$builder = new ClientBuilder('login', 'password');

        $soapClientFactory = new SoapClientFactory();
        $soapClientFactory->setTypeConverters(new TypeConverterCollection(
            array (
                new DateTimeTypeConverter(),
                new DateTypeConverter(),
            )
        ));

        $this->client = $builder
            ->setSoapClientFactory($soapClientFactory)
            ->build();

````

Передав пустой массив в TypeConverterCollection будут отключены все преобразования

## Примеры

Смотрите [список примеров, как отправлять конкретные сообщения](docs/samples.md)

## Установка:
```bash
$ composer require "pymba86/reformagkh-grabber"
```