
<?php get_header(); ?>
	<script type="text/javascript">

      $('#page_title').text("search");

  	</script>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
					<h2><?php the_title(); ?></h2>
					<div class="entry">
						<?php the_content(); ?>
					</div>

			<?php endwhile; else: ?>

			<center>
				<h3>暂时没有文章哦!</h3>
			</center>

			<?php endif; ?>

<?php get_footer();?>
