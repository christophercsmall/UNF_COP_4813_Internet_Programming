<?php

$tick = $_POST['view'];

$link = 'http://finance.yahoo.com/q?s='.$tick.'&fr=uh3_finance_web_gs_ctrl2&uhb=uhb2';

header('Location: $link');

?>