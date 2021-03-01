<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;
$facult_id = $_POST['facultet'];
$srok_sdachi = $_POST['srok_sdachi'];
$value = get_field( 'exclude_numb', $post->ID);
if( $value ) {
	$not_include = "AND izd_plan.number NOT IN($value)";
}
else {
	$not_include = '';
}
$year = get_field( 'year', $post->ID);
$year_on_click = $_POST['year'];
if ($facult_id > 0 && $srok_sdachi > 0 && $year_on_click) {
  $query = "SELECT SUM(izd_plan.sdano) as sdano, COUNT(izd_plan.facult_id) as total, SUM(izd_plan.izd_list) as sum, COUNT(izd_plan.facult_id), (SUM(izd_plan.sdano) / COUNT(izd_plan.facult_id)*100) as proc FROM izd_plan WHERE izd_plan.facult_id = $facult_id AND izd_plan.srok_sdachi = $srok_sdachi AND izd_plan.year = $year_on_click $not_include";
} else if ($facult_id > 0 && $srok_sdachi == 0 && $year_on_click) {
  $query = "SELECT SUM(izd_plan.sdano) as sdano, COUNT(izd_plan.facult_id) as total, SUM(izd_plan.izd_list) as sum, (SUM(izd_plan.sdano) / COUNT(izd_plan.facult_id)*100) as proc FROM izd_plan WHERE izd_plan.facult_id = $facult_id AND izd_plan.year = $year_on_click $not_include";
} else if ($facult_id == 0 && $srok_sdachi > 0 && $year_on_click) {
  $query = "SELECT SUM(izd_plan.sdano) as sdano, COUNT(izd_plan.facult_id) as total, SUM(izd_plan.izd_list) as sum, (SUM(izd_plan.sdano) / COUNT(izd_plan.facult_id)*100) as proc FROM izd_plan WHERE izd_plan.srok_sdachi = $srok_sdachi AND izd_plan.year = $year_on_click $not_include";
} else
$query = "SELECT SUM(izd_plan.sdano) as sdano, COUNT(izd_plan.facult_id) as total, SUM(izd_plan.izd_list) as sum, (SUM(izd_plan.sdano) / COUNT(izd_plan.facult_id)*100) as proc FROM izd_plan WHERE izd_plan.year = $year $not_include";
$row = $wpdb->get_row($query, ARRAY_A);
if ($row) : ?>
	<p>Всего работ по плану: <strong><?php echo($row['total']);$counts?></strong>. Общий объем: <strong><?php echo($row['sum'])?></strong> уч. изд. л.<br>Сдано в РИЦ <strong><?php echo($row['sdano'])?></strong> работ, что составляет <strong><?php $proc = round($row['proc'], 2); echo($proc); ?>%</strong> от общего количества за выбранный период.</p>
<?php else :?>
	<span> Не выбраны значения из формы.<br><br></span>
<?php endif; ?>	