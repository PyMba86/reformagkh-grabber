### Примеры запросов к Реформа ЖКХ

Вызов метода login не обязателен!
При первом запросе к сервису происходит вызов метода login для получения токена

--------------------
login
--------------------

Метод возвращает токен

```php
<?php
$client->login('viadmhmao', '02dc030');
```

--------------------
logout
--------------------

```php
<?php
$client->logout();
```

--------------------
getActualReportPeriod
--------------------

Метод возвращает текущий отчетный период в системе.

```php
<?php
$client->getActualReportPeriod();
```

--------------------
getCompanyProfilePage / getHouseProfilePage
--------------------

```php
<?php

$actualReport = $client->getActualReportPeriod();

$client->getCompanyProfilePage( // аналогично с getHouseProfilePage
            'd66e5325-3a25-4d29-ba86-4ca351d9704b', // GUID ХМАО-Югры
            1, // Номер страницы
            $actualReport->id
        );
```

--------------------
getCompanyProfileList / getHouseProfileList
--------------------

```php
<?php

$actualReport = $client->getActualReportPeriod();

       $result = $this->client->getHouseProfileList( // аналогично с getCompanyProfileList
            'd66e5325-3a25-4d29-ba86-4ca351d9704b', // GUID ХМАО-Югры
            $actualReport->id
        );
       
        foreach ($result as $item) {
            
            /** 
            * Тут ваш код
            *
            * Пример
            * echo $item->house_profile_data->house_type . "\n";
            */
            
        }
```