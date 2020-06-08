<?php 
/*
Template Name: Авт. редакция
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
			</div>

<div class="oform p-3 border">
	<div class="row">
		<div class="col-md-3 col-sm-12">
			<nav id="oformlemie" class="navbar navbar-light bg-light sticky-top">
			  <nav class="nav nav-pills flex-column">
			    <a class="nav-link" href="#item-1">Поля страниц</a>
			    <a class="nav-link" href="#item-2">Оформление текста</a>
			    <nav class="nav nav-pills flex-column">
			      <a class="nav-link ml-3 my-1" href="#item-2-1">Заголовки и подзаголовки</a>
			      <a class="nav-link ml-3 my-1" href="#item-2-2">Пояснительные и дополнительные тексты</a>
			      <a class="nav-link ml-3 my-1" href="#item-2-3">Пунктуационное оформление перечней</a>
			    </nav>
			    <a class="nav-link" href="#item-3">Иллюстрации</a>
			    <a class="nav-link" href="#item-4">Таблицы</a>
			    <a class="nav-link" href="#item-5">Приложения</a>
			    <a class="nav-link" href="#item-6">Аннотация</a>
			  </nav>
			</nav>
		</div>
      <div class="col-md-9 col-sm-12">
        <div data-spy="scroll" data-target="#oformlemie" data-offset="0" class="help-content">
          <h4 id="item-1" class="font-weight-bold">Поля страниц</h4>
          <p>Для того чтобы получился качественный оригинал-макет формата А5, распечатанный на листе А4 (две страницы на листе), следует придерживаться следующих параметров:</p>
          <p>Поля страниц (меню «Файл/Параметры страниц/Поля»): верхнее — 2 см; нижнее, левое и правое — 2,5 см. Здесь же в пункте «Источник бумаги» выставить в «От края: до верхнего колонтитула» — 0 см, «до нижнего колонтитула» — 1,6 см.</p>

          <figure class="figure">
            <a class="fancybox" href="<?php echo get_template_directory_uri() . '/img/parametri-stranici.png'?>" data-fancybox data-caption="Диалоговое окно Параметры страницы" title="Увеличить иллюстрацию">
              <img src="<?php echo get_template_directory_uri() . '/img/parametri-stranici.png'?>" alt="" class="figure-img img-fluid rounded" /></a>
              <figcaption class="figure-caption text-center mb-4">Диалоговое окно "Параметры страницы"</figcaption>
            </figure>
            <p>Далее вставить номера страниц, войдя в меню «Вставка/Номера страниц/Внизу/От центра» (в графе «Номер на первой странице» галочку не ставить, иначе на титульном листе будет стоять номер страницы 1).</p>
            <p>Для получения оригинал-макета в формате А5 необходимо набранный в А4 текст распечатать следующим образом: «Файл/Печать/Число страниц на листе 2». Получится на одном листе А4 две страницы издания.</p>
            <h4 id="item-2" class="font-weight-bold mt-4">Оформление текста</h4>
            <p>Основной текст должен быть набран <strong>14 размером</strong> шрифта Times New Roman через один интервал. Абзацный отступ — <strong>0,8 см</strong>. Интервал между строками — <strong>одинарный</strong>.</p>
            <figure class="figure">
              <a class="fancybox" href="<?php echo get_template_directory_uri() . '/img/font-and-paragraph.png'?>" data-fancybox data-caption="Настройки шрифта основного текста и абзацев" title="Увеличить иллюстрацию"><img src="<?php echo get_template_directory_uri() . '/img/font-and-paragraph.png'?>" class="figure-img img-fluid rounded" alt="..."></a>
              <figcaption class="figure-caption text-center mb-2">Настройки шрифта основного текста и абзацев</figcaption>
            </figure>
            <h5 id="item-2-1" class="font-weight-bold mt-4">Заголовки и подзаголовки</h5>
            <p>Заголовки и подзаголовки отделяют от основного текста сверху одной пробельной строкой и набирают прописными (большими) буквами (без подчеркивания и разрядки) <strong>16 размера</strong> шрифта.</p>

            <h5 id="item-2-2" class="font-weight-bold mt-4">Пояснительные и дополнительные тексты</h5>
            <p>Пояснительные и дополнительные тексты (списки условных сокращений и обозначений, примечания, перечни ключевых слов, терминов, основных понятий, документы, хрестоматийные материалы, фрагменты текстов из другой литературы, подрисуночные подписи, таблицы, нумерационные и тематические заголовки таблиц, приложения, библиографический список и т. д.) — <strong>12 размером</strong>.</p>
            <figure class="figure">
              <a class="fancybox" href="<?php echo get_template_directory_uri() . '/img/headers.png'?>" data-fancybox data-caption="Оформление заголовков, подзаголовков и дополнительных текстов" title="Увеличить иллюстрацию">
                <img src="<?php echo get_template_directory_uri() . '/img/headers.png'?>" alt="" class="figure-img img-fluid rounded" /></a>
                <figcaption class="figure-caption text-center mb-2">Оформление заголовков, подзаголовков и дополнительных текстов</figcaption>
              </figure>
              <h5 id="item-2-3" class="font-weight-bold mt-4">Пунктуационное оформление перечней</h5>
              <p>а) если после двоеточия стоит номер-цифра со скобкой, то перечисление нужно начинать со строчной буквы; в конце фразы ставить точку с запятой;</p>
              <p>б) если после двоеточия стоит номер-цифра с точкой, то перечисление нужно начинать с прописной буквы; в конце фразы ставить точку.</p>
              <figure class="figure m-auto">
                <a class="fancybox" href="<?php echo get_template_directory_uri() . '/img/punct.png'?>" data-fancybox data-caption="Пунктуационное оформление перечней" title="Увеличить иллюстрацию">
                  <img src="<?php echo get_template_directory_uri() . '/img/punct.png'?>" alt="" class="figure-img img-fluid rounded  m-auto" /></a>
                  <figcaption class="figure-caption text-center mb-2">Пунктуационное оформление перечней</figcaption>
                </figure>
                <h4 id="item-3" class="font-weight-bold mt-4">Иллюстрации</h4>
                <p>Иллюстрацию располагают после ссылки или возможно ближе к ней, а именно помещают на той же полосе или развороте, что и ссылка на неё.</p>
                <p>Ссылка может состоять:</p>
                <p>а) из условного названия иллюстрации и порядкового номера (например: «Рис. 6»);</p>
                <p>б) из условного названия иллюстрации, порядкового номера и буквенного или словесного обозначения её части («Рис. 6, а»; «Рис. 6, снизу»).</p>
                <p>В каждом виде издания должно быть выдержано единое оформление подрисуночных подписей (типа «Рис. 1», «Рис. 5.7»). Если рисунок в части издания или в целом издании один, то его не нумеруют, ссылку на него делают словом «рисунок» без сокращения, а под самим рисунком ничего не пишут. Экспликация (т. е. расшифровка условных обозначений деталей и частей изображения) без собственно подписи (темы изображения) недопустима.</p>
                <p>Подпись (так же, как и надписи на самом рисунке) всегда начинают с прописной буквы, экспликацию — со строчной. Точки в конце подписи не ставят. Нумерация иллюстраций может быть сквозной (через всё издание) или индексационной (поглавной). Единый принцип нумерации обязателен для всех нумерационных рядов издания (рубрики, таблицы, формулы, иллюстрации).</p>
                <p>Образец оформления иллюстрации с подрисуночной надписью представлен ниже (рис. 1).</p>
                <figure class="figure">
                  <a class="fancybox" href="<?php echo get_template_directory_uri() . '/img/ris1.png'?>" data-fancybox data-caption="Оформление иллюстраций" title="Увеличить иллюстрацию">
                    <img src="<?php echo get_template_directory_uri() . '/img/ris1.png'?>" alt="" class="figure-img img-fluid rounded" /></a>
                    <figcaption class="figure-caption text-center mb-2">Оформление иллюстраций</figcaption>
                  </figure>
                  <h4 id="item-4" class="font-weight-bold mt-4">Таблицы</h4>
                  <p>Таблицы набирают средствами программы MS Word с помощью меню «Вставка - Таблица». Ссылаться на таблицу нужно в том месте текста, где формируется положение, дополняемое, подтверждаемое или иллюстрируемое табличными данными. Ссылка на таблицу в тексте обязательна (табл. 1).</p>
                  <figure class="figure">
                    <a class="fancybox" href="<?php echo get_template_directory_uri() . '/img/tabl.png'?>" data-fancybox data-caption="Образец оформления таблицы" title="Увеличить иллюстрацию">
                      <img src="<?php echo get_template_directory_uri() . '/img/tabl.png'?>" alt="" class="figure-img img-fluid rounded" /></a>
                      <figcaption class="figure-caption text-center mb-2">Образец оформления таблицы</figcaption>
                    </figure>
                    <p>Таблицу рекомендуется размещать после ссылки на неё в тексте, обязательно в пределах данного раздела, т. е. до следующего заголовка, но не непосредственно перед ним. Рубрика или всё издание не может заканчиваться таблицей. Таблица должна быть закрыта двумя-тремя строками текста после неё.</p>
                    <p>Таблицы могут быть «закрытыми» (взятыми в рамку из линеек со всех сторон), «частично закрытыми» или «открытыми» (без внешних линеек). В каждом издании следует придерживаться единообразия в оформлении табличного материала.</p>
                    <p>Система нумерации таблицы может быть сквозной через всё издание, сквозной постатейно, индексационной (поглавной). Если таблица единственная в издании или статье, то её не нумеруют, следовательно, отпадает надобность и в нумерационном заголовке: ставить в заголовке слово «Таблица» без номера нет смысла: читатель и так знает, что перед ним таблица.</p>
                    <p>Тематический заголовок определяет тему и содержание таблицы. Он нужен для того, чтобы читатель мог пользоваться таблицей, не обращаясь к основному тексту. Тематический заголовок ставят над таблицей под её нумерационным заголовком, выделяют шрифтом (обычно полужирного начертания), без знака препинания в конце.</p>
                    <p>Наиболее распространённая форма: слово «Таблица» и её номер арабскими цифрами (без знака номера перед ними, без точки на конце) ставят над тематическим заголовком. Нумерационный заголовок вставляют в правый край набора и чаще всего выделяют курсивом или разрядкой.</p>
                    <p>Над продолжением таблицы на новой полосе помещают заголовок «Продолжение табл. 1» (если таблица на этой полосе не оканчивается) или «Окончание табл. 1» (если таблица здесь завершается).</p>
                    <p>Оставлять ячейки таблицы пустыми не допускается, при отсутствии сведений в ячейке ставят тире.</p>
                    <h4 id="item-5" class="font-weight-bold mt-4">Приложения</h4>
                    <p>Особенности набора приложений состоят в следующем. В приложения выносят вспомогательные материалы: описания алгоритмов и компьютерных программ, заимствованные материалы, промежуточные расчёты, таблицы и т.п. Каждое из приложений оформляют как самостоятельный документ со своей рубрикацией, нумерацией рисунков и таблиц. Располагают приложения в порядке ссылок на них в основном тексте.</p>
                    <p>Каждое приложение следует начинать с нового листа. В правом верхнем углу указывают его номер, например, «Приложение 2». Если приложение одно, его не нумеруют, ограничиваясь надписью «Приложение».</p>
                    <h4 id="item-6" class="font-weight-bold mt-4">Аннотация</h4>
                    <p>Аннотация — это краткая, точная, логические связанная и грамотно изложенная информация о содержании книги (10—15 строк). Она не должна содержать второстепенной информации.</p>
                    <p>Основная функция аннотации — сигнальная, позволяющая читателю установить основное содержание книги и решить, необходимо ли обращаться к первоисточнику.</p>
                    <p>По своему назначению аннотация — справочная, т. к. уточняет неясное заглавие и сообщает в справочных целях сведения об авторе, содержании и других особенностях документа.</p>
                    <p>По объему и глубине свертывания информации — описательная: обобщенно характеризует содержание и приводит перечень основных тем, отвечает на вопрос «О чем сообщается в пособии?».</p>
                    <p>Аннотацию желательно строить из коротких фраз, не употреблять разновременные глаголы, например: «Представлены» и «Представляются», т. е. соблюдать единство времени во всех предложения.</p>
                    <p>Язык аннотации должен быть прост и доходчив. Следует избегать лишних вводных фраз. Рекомендуется употреблять синтаксические конструкции, свойственные языку научных дисциплин, избегать сложных предложений, включающих несколько придаточных.</p>
                    <p>Фразы следует строить комплексно, употреблять стандартизированную терминологию, не использовать малораспространенные термины или разъяснять их при первом упоминании в тексте, соблюдать единство терминологии.</p>
                    <p>Еще раз напомним, что аннотация включает характеристику темы, про-блемы, цели работы и ее основные выводы.</p>
			</div>
		</div>
	</div>
</div>
			



		</div>
	</main>
</div>
					<?php get_footer();?>