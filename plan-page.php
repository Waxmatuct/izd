<?php 
/*
Template Name: План изданий
*/
 ?>
<?php get_header(); ?>
		<div class="content d-flex flex-column p-4 pt-5">
		  <div class="m-auto article">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			    <h2 class="h4 font-weight-bold text-left mt-4">Статистика за выбранный период</h2>
			    <div class="count">
			      <?php 
			      require get_template_directory() . '/ajax/count.php';
			      ?>
			    </div>
			    <p class="text-muted" style="font-size: 0.9rem">* Таблица обновлена <?php echo the_field( 'update');?></p>
			    <p class="text-muted" style="font-size: 0.9rem">** Литература приобретает статус «издано» после передачи на склад материально-технического снабжения.</p>
		  </div>
		  
		  <form class="border rounded p-3 d-flex justify-content-center align-items-center flex-wrap">
		    <div class="form-group mr-5">
		      <label for="faculteti">Выберите факультет</label>
		      <select class="form-control" id="faculteti">
		        <option value="0" selected="selected">- Все факультеты -</option>
		        <option value="1">Факультет туризма и сервиса</option>
		        <option value="2">Инженерно-экологический факультет</option>
		        <option value="3">Факультет экономики и процессов управления</option>
		        <option value="4">Социально-педагогический факультет</option>
		        <option value="5">Юридический факультет</option>
		        <option value="6">Университетский колледж</option>
		      </select>
		    </div>
		    <div class="form-group mr-5">
		      <label for="srok_sdachi">Выберите месяц сдачи</label>
		      <select class="form-control" id="srok_sdachi">
		        <option value="0" selected="selected">- Все месяцы -</option>
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
			<script type="text/javascript">
				var template_directory = "<?php echo get_template_directory_uri(); ?>";
			</script>
		    <input type="button" class="btn btn-primary p-2 mt-3" style="width: 150px;" value="Применить" onclick="onClick()" ></input>
		  </form>
		  <div id="plan" class="table-responsive main-table mt-3 d-none">
		    <table class="table table-hover table-striped">
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
		          <th scope="col">Статус **</th>               
		        </tr>
		      </thead>
		      <tbody>
		        <?php 
		        require get_template_directory() . '/ajax/tbody.php';
		        ?></tbody>
		      </table>
		    </div>


		</div>
  </main>
</div>
<?php get_footer();?>