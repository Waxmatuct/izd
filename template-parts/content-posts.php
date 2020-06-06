<?php
/**
 * Template part for displaying page content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
?>
      	<artcile id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      		<header class="entry-header">
		        <h2 class="h4 font-weight-bold text-left"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
	    	</header><!-- .entry-header -->
        	<div class="entry-content">
				<?php
				the_content();
				?>
			</div><!-- .entry-content -->
			<footer class="entry-footer">
				<span class="meta-text small">
					<?php the_time( get_option( 'date_format' ) ); ?>
				</span>
			</footer>
	    </artcile>