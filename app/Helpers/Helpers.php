<?php

use Morilog\Jalali\Jalalian;

function jalaliDate($date , $format = '%A, %d %B %Y H:i:s'){

 return Jalalian::forge($date)->format($format); // دی 02، 1391

}

?>
