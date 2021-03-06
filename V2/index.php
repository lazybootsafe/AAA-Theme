<?php get_header(); ?>

<div class="page-information-card-container"></div>

<?php get_sidebar(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<?php if ( have_posts() ) : ?>
		<?php
			while ( have_posts() ) :
				the_post();
				if (get_post_type() == 'post'){
					get_template_part( 'template-parts/content', get_post_format() );
				}else{
					get_template_part( 'template-parts/content-shuoshuo-preview', get_post_format() );
				}
			endwhile;
		?>
		<?php
			echo get_AAA_formatted_paginate_links_for_all_platforms();
		?>
		<?php
	endif;
	?>

<?php get_footer(); ?>
