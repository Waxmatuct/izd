<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php'); 
global $wpdb;
$query = "SELECT * FROM izd_plan ORDER BY number DESC";
$result = $wpdb->get_results($query, ARRAY_N);
if ($result) : 
  foreach ($result as $row) { 
    $number = $row[1];
    $facult_id = $row[2];
    $facult = "";
    if ($facult_id == 1) $facult = "ФТС";
    else if ($facult_id == 2) $facult = "ИЭФ";
    else if ($facult_id == 3) $facult = "ФЭиПУ";
    else if ($facult_id == 4) $facult = "СПФ";
    else if ($facult_id == 5) $facult = "ЮФ";
    else if ($facult_id == 6) $facult = "УЭТК";
    $author = $row[3];
    $naimen = $row[4];
    $vid_izd = $row[5];
    $disciple = $row[6];
    $izd_list = $row[7];
    $tiraj = $row[8];
    $srok_sdachi = $row[10];
    $srok1 = "";
    if ($srok_sdachi == 1) $srok1 = "Январь";
    else if ($srok_sdachi == 2) $srok1 = "Февраль";
    else if ($srok_sdachi == 3) $srok1 = "Март";
    else if ($srok_sdachi == 4) $srok1 = "Апрель";
    else if ($srok_sdachi == 5) $srok1 = "Май";
    else if ($srok_sdachi == 6) $srok1 = "Июнь";
    else if ($srok_sdachi == 7) $srok1 = "Июль";
    else if ($srok_sdachi == 8) $srok1 = "Август";
    else if ($srok_sdachi == 9) $srok1 = "Сентябрь";
    else if ($srok_sdachi == 10) $srok1 = "Октябрь";
    $srok_predost = $row[11];
    $srok2 = "";
    if ($srok_predost == 0) $srok2 = "-";
    else if ($srok_predost == 1) $srok2 = "Январь";
    else if ($srok_predost == 2) $srok2 = "Февраль";
    else if ($srok_predost == 3) $srok2 = "Март";
    else if ($srok_predost == 4) $srok2 = "Апрель";
    else if ($srok_predost == 5) $srok2 = "Май";
    else if ($srok_predost == 6) $srok2 = "Июнь";
    else if ($srok_predost == 7) $srok2 = "Июль";
    else if ($srok_predost == 8) $srok2 = "Август";
    else if ($srok_predost == 9) $srok2 = "Сентябрь";
    else if ($srok_predost == 10) $srok2 = "Октябрь";
    $status = $row[12];
    $st="";
    if ($status == 0) $st = "-";
    elseif ($status == 1) $st ="В работе";
    elseif ($status == 2) $st ="В печати";
    elseif ($status == 3) $st ="Отпечатано";
    elseif ($status == 4) $st ="Издано";
    ?>
    <tr>
      <th scope="row" class="text-center"><?=$number?></th>
      <td class="text-center"><?=$facult?></td>
      <td class="text-center"><?=$author?></td>
      <td><?=$naimen?></td>
      <td class="text-center"><?=$vid_izd?></td>
      <td class="text-center"><?=$disciple?></td>
      <td class="text-center"><?=$izd_list?></td>
      <td class="text-center"><?=$tiraj?></td>
      <td class="text-center"><?=$srok1?></td>
      <td class="text-center"><?=$srok2?></td>
      <td class="text-center"><?=$st?></td>
    </tr>
    <?
  }
else :?>
  <span> Не найдено</span>
<?php endif; ?> 

