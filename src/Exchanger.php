<?php

namespace vprivaloff\exchanger;

use vprivaloff\exchanger\Currency;

class Exchanger
{
  public function CBR_exchange($cur = 'USD')
  {
    // Формируем сегодняшнюю дату
    $date = date( "d/m/Y" );
    // Формируем ссылку
    $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date";
    // Загружаем HTML-страницу
    $fd = fopen($link, "r");
    $content = "";

    if ( !$fd ){
      echo "Запрашиваемая страница не найдена";
    } else {
      // Чтение содержимого файла в переменную $content
      while (!feof ( $fd )) $content .= fgets($fd, 4096);
    }
    // Закрыть открытый файловый дескриптор
    fclose ( $fd );

    // Разбираем содержимое, при помощи регулярных выражений
    $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i"; 
    preg_match_all($pattern, $content, $array, PREG_SET_ORDER);

    $currency = Currency::$cur;

    foreach($array as $value)
    {
      if($value[2] == $currency){
        $result = str_replace(",",".",$value[4]);
      }
    }

    return $result;
  }
}