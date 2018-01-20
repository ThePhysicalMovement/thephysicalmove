<?php
function get_weekday($strdate) {
  if ( strlen($strdate) ) {
    return DateTime::createFromFormat('Y-m-d', $strdate)->format('D');
  }
}

function get_time($time, $first = false) {
  if ( strlen($time) == 8 ) {
    $time24h = substr($time, 0, 5);
    $hour = substr($time24h, 0, 2);
    $minutes = substr($time24h, 2, 5);
    $hour = (int)$hour;
    if ($hour > 12 && $hour < 24) {
      $hour = $hour % 12;
      $format = 'pm';
    }
    else {
      $format = 'am';
    }

    if ($first) {
      return $hour . $minutes;
    }
    return $hour . $minutes . $format;
  }
}

?>
