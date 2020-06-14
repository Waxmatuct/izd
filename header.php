<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Required meta tags -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap&subset=cyrillic" rel="stylesheet">
  <meta name="keywords" content="сочинский, государственный, университет, сочи, РИЦ, редакция, типография">
  <meta name="description" content="Редакционно-издательский центр">
  <meta name="yandex-verification" content="1e910acb743c310a" />
  <title><?php wp_title(); ?> - <?php bloginfo( 'name' ); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
  <div class="container">
    <header class="header mt-2 mb-4 pl-4 pr-4">
      <div class="row">
        <div class="col-lg-8 col-12">
          <?
            $logo_img = '';
            if( $custom_logo_id = get_theme_mod('custom_logo') ){
              $logo_img = wp_get_attachment_image( $custom_logo_id, array(75,75), false, array(
                'class'    => 'd-block float-left logo ml-0 mt-2 mb-2 mr-2',
                'itemprop' => 'logo',
                'alt'      => 'logo'
              ) );
            }
            echo $logo_img;
          ?> 
        <div class="titles d-flex flex-column justify-content-center mt-3 mb-3">
            <h1 class="site-title m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-decoration-none text-dark font-weight-bold"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
              $izd_description = get_bloginfo( 'description', 'display' );
              if ( $izd_description || is_customize_preview() ) : ?>
            <span class="text-muted"><?php echo $izd_description; /* WPCS: xss ok. */ ?></span>
              <?php endif; ?>
          </div>
        </div>
        <div class="adress col-lg-4 col-12">
          <span class="text-dark text-right">г. Сочи, ул. Пластунская 94, каб. 113/1</span>
          <span class="text-dark text-right"><a href="tel: +78622682573">+7 (862) 268 25 73</a></span>
          <span class="text-dark text-right"><a href="mailto:izd-sgu@yandex.ru">izd-sgu@yandex.ru</a></span>
        </div>
      </div>
    </header>
    <main role="main" class="shadow-lg" style="border-radius: 10px">
      <nav role="nav" class="navigation">

<?php
    wp_nav_menu( array(
      'theme_location' => 'main-menu',
      'menu_id'        => '',
      'container'      => false,
      'depth'          => 2,
      'menu_class'     => 'nav-menu p-3',
      'walker'         => new Bootstrap_NavWalker(),
      'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
    ) );
    ?>

      </nav>
