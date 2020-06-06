<?php get_header(); ?>
		<div class="content d-flex flex-column p-4 pt-5">
		  <div class="m-auto article">
			<?php
			while ( have_posts() ) :
				the_post();?>
				
		      	<artcile id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		      		<header class="entry-header">
				        <h2 class="h4 font-weight-bold text-left"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
						<span class="d-block meta-text small mb-3">
							<?php the_time( get_option( 'date_format' ) ); ?>
						</span>
			    	</header><!-- .entry-header -->
		        	<div class="entry-content">
						<?php
						the_content('Читать далее...'); 
						?>
					</div><!-- .entry-content -->
			    </artcile>	


			<?endwhile; // End of the loop.
			?>		
		  </div>
		</div>
  </main>
</div>

<?php
get_footer();
?>