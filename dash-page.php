<?php 
/*
Template Name: Dashboard
*/
?>
<?php get_header( 'dash' ); ?>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;
// если была нажата кнопка "Отправить"
if($_POST['submit1']) {
  $number = $wpdb->_real_escape($_POST['number']);
  $facult_id = $wpdb->_real_escape($_POST['faculteti']);
  $authors = $wpdb->_real_escape($_POST['authors']);
  $naimen = $wpdb->_real_escape($_POST['naimen']);
  $vid_izd = $wpdb->_real_escape($_POST['vid_izd']);
  $disciple = $wpdb->_real_escape($_POST['disciple']);
  $izd_list = $wpdb->_real_escape($_POST['izd_list']);
  $tiraj = $wpdb->_real_escape($_POST['tiraj']);
  $year = 2020;
  $srok_sdachi = $_POST['srok_sdachi'];
  $query = "INSERT INTO plan (number, facult_id, author, naimen, vid_izd, disciple, izd_list, tiraj, year, srok_sdachi) VALUES ('$number', '$facult_id', '$authors', '$naimen', '$vid_izd', '$disciple', '$izd_list', '$tiraj', '$year', '$srok_sdachi')";
  $result = $wpdb->query($query);
  if ($result) : 
	echo "<script>alert(\"Данные успешно внесены.\"); location='index.php';</script>"; 
	else : echo "<script>alert(\"Ошибка.\"); location='index.php';</script>";
  endif;
}
if ($_POST['submit2']) {
  $number = $_POST['_number'];
  $mesac_sdachi = $_POST['mesac_sdachi'];
  $sdano = 1;
  $status = $_POST['status'];
  if ($mesac_sdachi < 1 ) {
  	$query = "UPDATE plan SET sdano = '$sdano', status = '$status' WHERE number = '$number'";
  } else $query = "UPDATE plan SET sdano = '$sdano', srok_predost = '$mesac_sdachi', status = '$status' WHERE number = '$number'";
  $result = $wpdb->query($query);
  if ($result) :
	echo "<script>alert(\"Данные успешно внесены.\"); location='index.php';</script>"; 
	else : echo "<script>alert(\"Ошибка.\"); location='index.php';</script>";
  endif;
}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">План изданий</h1>
  </div>
  <p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#plan_izd" aria-expanded="false" aria-controls="collapseExample">
      Внести инфу в план
    </button>
  </p>
  <div class="collapse" id="plan_izd">
    <div class="card card-body">
      <form method="post" class="was-validated">
        <div class="form-group">
          <input type="text" class="form-control" style="width: 8%" id="number" placeholder="№" name="number" required>
        </div>
        <div class="form-group w-25">
          <select class="form-control" id="faculteti" name="faculteti" required>
            <option value="">- Выбери факультет -</option>
            <option value="1">Факультет туризма и сервиса</option>
            <option value="2">Инженерно-экологический факультет</option>
            <option value="3">Факультет экономики и процессов управления</option>
            <option value="4">Социально-педагогический факультет</option>
            <option value="5">Юридический факультет</option>
            <option value="6">Университетский колледж</option>
          </select>
        </div>
        <div class="form-group w-50">
          <input type="text" class="form-control" id="authors" placeholder="Авторы" name="authors" required>
        </div>
        <div class="form-group w-50">
          <textarea class="form-control" id="naimen" rows="3" name="naimen" placeholder="Наименование рукописи" required></textarea>
        </div>
        <div class="form-group w-25">
          <input type="text" class="form-control" id="vid_izd" placeholder="Вид издания" name="vid_izd" required>
        </div>
        <div class="form-group w-50">
          <input type="text" class="form-control" id="disciple" placeholder="Дисциплина" name="disciple" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" style="width: 10%" id="izd_list" placeholder="Объем уч. изд. л." name="izd_list" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" style="width: 10%" id="tiraj" placeholder="Тираж" name="tiraj" required>
        </div>
        <div class="form-group w-25">
          <select class="custom-select" id="srok_sdachi" name="srok_sdachi" required>
            <option value="">- Месяц сдачи -</option required>
              <option value="1">Январь</option>
              <option value="2">Февраль</option>
              <option value="3">Март</option>
              <option value="4">Апрель</option>
              <option value="5">Май</option>
              <option value="6">Июнь</option>
              <option value="7">Июль</option>
              <option value="8">Август</option>
              <option value="9">Сентябрь</option>
            </select>
          </div>
          <input type="submit" class="btn btn-primary p-2" style="width: 150px;" value="Отправить" name="submit1"></input>
        </form>
      </div>
    </div>
    <p class="mt-2">
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#obn_plan" aria-expanded="false" aria-controls="collapseExample">
        Обновить статус в плане
      </button>
    </p>
    <div class="collapse" id="obn_plan">
      <div class="card card-body">
        <form method="post" class="form-inline was-validated">
          <div class="form-group mt-2">
            <input type="text" class="form-control mr-2" id="_number" placeholder="№" name="_number" value="" required>
            <select class="custom-select mr-2" id="mesac_sdachi" name="mesac_sdachi">
              <option value="">- Месяц факт. сдачи -</option required>
                <option value="1">Январь</option>
                <option value="2">Февраль</option>
                <option value="3">Март</option>
                <option value="4">Апрель</option>
                <option value="5">Май</option>
                <option value="6">Июнь</option>
                <option value="7">Июль</option>
                <option value="8">Август</option>
                <option value="9">Сентябрь</option>
                <option value="10">Октябрь</option>
              </select>
              <select class="custom-select mr-2" id="status" name="status" required>
                <option value="">- Выбрать статус -</option required>
                  <option value="1">В работе</option>
                  <option value="2">В печати</option>
                  <option value="3">Отпечатано</option>
                  <option value="4">Издано</option>
                </select>
                <input type="submit" class="btn btn-primary p-2" style="width: 150px;" name="submit2" value="Применить"></input>
              </div>
            </form>
          </div>
        </div>

        <div id="plan" class="table-responsive main-table mt-3">
          <table id="plan-table" class="table table-hover table-striped">
            <thead>
              <tr>
                <th scope="col">№ в плане</th>
                <th scope="col">Факультет</th>
                <th scope="col">Авторы</th>
                <th scope="col">Наименование рукописи</th>
                <th scope="col">Вид издания</th>
                <th scope="col">Дисциплина</th>
                <th scope="col">Объем, уч.изд. л</th>
                <th scope="col">Тираж</th>
                <th scope="col">Месяц сдачи</th>
                <th scope="col">Сдано</th>
                <th scope="col">Статус</th>               
              </tr>
            </thead>
            <tbody>
              <?php 
		        require get_template_directory() . '/ajax/dash-tbody.php';
		        ?>
            </tbody>
          </table>
        </div>

      </main>
    </div>
  </div>
<?php get_footer( 'dash' ); ?>