<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;
$facult_id = $_POST['facultet'];
$srok_sdachi = $_POST['srok_sdachi'];
$not_include = get_field( 'exclude_numb', 49);
if ($facult_id > 0 && $srok_sdachi > 0) {
  $query = "SELECT SUM(izd_plan.sdano) as sdano, COUNT(izd_plan.facult_id) as total, SUM(izd_plan.izd_list) as sum, COUNT(izd_plan.facult_id), (SUM(izd_plan.sdano) / COUNT(izd_plan.facult_id)*100) as proc FROM izd_plan WHERE facult_id = $facult_id AND srok_sdachi = $srok_sdachi AND izd_plan.id NOT IN($not_include)";
} else if ($facult_id > 0 && $srok_sdachi == 0) {
  $query = "SELECT SUM(izd_plan.sdano) as sdano, COUNT(izd_plan.facult_id) as total, SUM(izd_plan.izd_list) as sum, (SUM(izd_plan.sdano) / COUNT(izd_plan.facult_id)*100) as proc FROM izd_plan WHERE facult_id = $facult_id AND izd_plan.id NOT IN($not_include)";
} else if ($facult_id == 0 && $srok_sdachi > 0) {
  $query = "SELECT SUM(izd_plan.sdano) as sdano, COUNT(izd_plan.facult_id) as total, SUM(izd_plan.izd_list) as sum, (SUM(izd_plan.sdano) / COUNT(izd_plan.facult_id)*100) as proc FROM izd_plan WHERE srok_sdachi = $srok_sdachi AND izd_plan.id NOT IN($not_include)";
} else
$query = "SELECT SUM(izd_plan.sdano) as sdano, COUNT(izd_plan.facult_id) as total, SUM(izd_plan.izd_list) as sum, (SUM(izd_plan.sdano) / COUNT(izd_plan.facult_id)*100) as proc FROM izd_plan WHERE izd_plan.id NOT IN($not_include)";
$row = $wpdb->get_row($query, ARRAY_A);
if ($row) : ?>
	<p>Всего работ по плану: <strong><?echo($row['total']);$counts?></strong>. Общий объем: <strong><?echo($row['sum'])?></strong> уч. изд. л.<br>Сдано в РИЦ <strong><?echo($row['sdano'])?></strong> работ, что составляет <strong><?$proc = round($row['proc'], 2); echo($proc)?>%</strong> от общего количества за выбранный период.</p><?
else :?>
	<span> Не найдено</span>
<?php endif; ?>	