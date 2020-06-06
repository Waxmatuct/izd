<footer class="blog-footer">
	<p>© Редакционно-издательский центр, <? $date = date("Y"); echo $date; ?><br> ФГБОУ ВО «Сочинский государственный университет»</p>
	<small>Дизайн и разработка сайта - <a href="mailto:pletnevsochi@yandex.ru">Дмитрий Плетнев</a></small>
	<!-- <p>
		<a href="#">Наверх</a> / 
		<?php  if($_SESSION['admin'] != "admin") { ?>
			<a href="login.php">Логин</a>
		<? } 
		else {
			?>
			<a href="?do=logout">Выйти</a>
			<?}?>
		</p> -->
	</footer>
	<?php wp_footer(); ?>
</body>
</html>