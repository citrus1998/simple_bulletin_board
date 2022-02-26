<?php
    $now_year = 2019;
    $birth_year = 1998;
    $live_times = $now_year - $birth_year;
    echo ($live_times - ($live_times % 4)) / 4;
?>