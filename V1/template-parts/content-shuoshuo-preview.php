<div class="shuoshuo-preview-container card bg-white shadow-sm border-0" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( get_the_title() != '' ) : ?>
			<a class="shuoshuo-title"><?php the_title(); ?></a>
		<?php endif; ?>

		<div class="shuoshuo-content">
			<?php the_content(); ?>
		</div>
	</article>
	<div class="shuoshuo-preview-meta">
		<span>
			<i class="fa fa-calendar-o" aria-hidden="true"></i> 
			<span class="shuoshuo-date-month"><?php echo get_the_time('n')?></span> <?php _e('月', 'argon');?> 
			<span class="shuoshuo-date-date"><?php echo get_the_time('d')?></span> <?php _e('日', 'argon');?> , 
			<span class="shuoshuo-date-year"><?php echo get_the_time('Y')?></span>
			<div class="post-meta-devide">|</div>
			<i class="fa fa-clock-o" aria-hidden="true"></i> 
			<span class="shuoshuo-date-time"><?php echo get_the_time('G:i:s')?></span>
		</span>
		<?php if ( is_sticky() ) : ?>
			<div class="post-meta-devide">|</div>
			<div class="post-meta-detail post-meta-detail-words">
				<i class="fa fa-thumb-tack" aria-hidden="true"></i>
				<?php _e('置顶', 'argon');?>
			</div>
		<?php endif; ?>
	</div>		
	<a class="shuoshuo-preview-link btn btn-outline-primary btn-icon-only rounded-circle" type="button" href="<?php the_permalink(); ?>">
		<span class="btn-inner--icon"><i class="fa fa-arrow-right"></i></span>
	</a>
</div>