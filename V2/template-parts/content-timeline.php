<article class="post post-full card bg-white shadow-sm border-0" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header text-center<?php if (AAA_has_post_thumbnail() && get_option('AAA_show_thumbnail_in_banner_in_content_page') != 'true'){echo " post-header-with-thumbnail";}?>">
		<?php
			if (AAA_has_post_thumbnail() && get_option('AAA_show_thumbnail_in_banner_in_content_page') != 'true'){
				$thumbnail_url = AAA_get_post_thumbnail();
				echo "<img class='post-thumbnail' src='" . $thumbnail_url . "'></img>";
				echo "<div class='post-header-text-container'>";
			}
			if (AAA_has_post_thumbnail() && get_option('AAA_show_thumbnail_in_banner_in_content_page') == 'true'){
				$thumbnail_url = AAA_get_post_thumbnail();
				echo "
				<style>
					body section.banner {
						background-image: url(" . $thumbnail_url . ") !important;
					}
				</style>";
			}
		?>
		<a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<div class="post-meta">
			<?php
				$metaList = explode('|', get_option('AAA_article_meta', 'time|views|comments|categories'));
				if (is_sticky() && is_home() && ! is_paged()){
					array_unshift($metaList, "sticky");
				}
				if (post_password_required()){
					array_unshift($metaList, "needpassword");
				}
				if (is_meta_simple()){
					array_remove($metaList, "time");
					array_remove($metaList, "edittime");
					array_remove($metaList, "categories");
					array_remove($metaList, "author");
				}
				if (count(get_the_category()) == 0){
					array_remove($metaList, "categories");
				}
				for ($i = 0; $i < count($metaList); $i++){
					if ($i > 0){
						echo ' <div class="post-meta-devide">|</div> ';
					}
					echo get_article_meta($metaList[$i]);
				}
			?>
		</div>
		<?php
			if (has_post_thumbnail() && get_option('AAA_show_thumbnail_in_banner_in_content_page') != 'true'){
				echo "</div>";
			}
		?>
	</header>

	<div class="post-content" id="post_content">
		<?php if (post_password_required()){ ?>
			<div class="text-center container">
				<form action="/wp-login.php?action=postpass" class="post-password-form" method="post">
					<div class="post-password-form-text"><?php _e('??????????????????????????????????????????????????????????????????', 'AAA');?></div>
					<div class="row">
						<div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-12 post-password-form-input">
							<div class="input-group input-group-alternative">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-key"></i></span>
								</div>
								<input name="post_password" class="form-control" placeholder="??????" type="password">
							</div>
						</div>
					</div>
					<input class="btn btn-primary" type="submit" name="Submit" value="??????">
				</form>
			</div>
		<?php
			}else{
				$POST = $GLOBALS['post'];
				echo "<div class='AAA-timeline'>";
				$last_year = 0;
				$posts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
				foreach ($posts as $post){
					setup_postdata($post);
					$year = mysql2date('Y', $post -> post_date);
					if ($year != $last_year){
						echo "<div class='AAA-timeline-node'>
								<div class='AAA-timeline-time archive-timeline-year'>" . $year . "</div>
								<div class='AAA-timeline-card card bg-gradient-secondary archive-timeline-title'></div>
							</div>";
							$last_year = $year;
					} ?>
					<div class='AAA-timeline-node'>
						<div class='AAA-timeline-time'><?php echo mysql2date('m-d', $post -> post_date); ?></div>
						<div class='AAA-timeline-card card bg-gradient-secondary archive-timeline-title'>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
					</div>
					<?php
				}
				echo '</div>';
				$GLOBALS['post'] = $POST;
			}
		?>
	</div>

	<?php if (has_tag()) { ?>
		<div class="post-tags">
			<i class="fa fa-tags" aria-hidden="true"></i>
			<?php
				$tags = get_the_tags();
				foreach ($tags as $tag) {
					echo "<a href='" . get_category_link($tag -> term_id) . "' target='_blank' class='tag badge badge-secondary post-meta-detail-tag'>" . $tag -> name . "</a>";
				}
			?>
		</div>
	<?php } ?>
</article>