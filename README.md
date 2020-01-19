yii2-exchanger
==============

Курс валют ЦБ РФ

Установка
---------

```
composer require vprivaloff/yii2-exchanger
```

Предпочтительный способ установить это расширение через [composer](http://getcomposer.org/download/).

* Либо запустив через консоль

```
composer require vprivaloff/yii2-exchanger
```

или добавить 

```json
"vprivaloff/yii2-exchanger": "*"
```

в раздел `require` вашего приложения в файл `composer.json`.

Для подключения необходмо использовать следующие пронстранства имен:

```php
use vprivaloff\exchanger\Exchanger;
use vprivaloff\exchanger\Currency;

//определяем необходимую валюту
$currency = Currency::EUR;

//получаем стоимость в рублях по текущему курсу на сегодня
$euro = Exchanger::CBR_exchange($currency);
...
```
