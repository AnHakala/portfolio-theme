<?php /* Template Name: Archive Project */ ?>

<?php get_header('simple'); ?>

<?php
$query = new WP_Query( array( 'post_type' => 'projects') );
?>

<main id="site-main" role="main">
	<div id="my-projects-container">
		<div class="archive-project-text-container">
			<h1>My Projects</h1>
		</div>
		<figure id="text-divider-container">
			<img class="text-divider" src="<?php bloginfo('template_directory'); ?>/images/feed_divider.png" alt="divider">
		</figure>
		<div class="archive-project-container">
		<?php	
		if ($query -> have_posts()) {
			while ($query -> have_posts()) {
			?>
				<div class="single-container">
			<?php		
					$query -> the_post();
			?>
					<a class="project-links" href="<?php the_permalink($post -> ID); ?>">
						<div class="image-wrap">
							<img class="image-container" src="<?php the_post_thumbnail_url('grid_thumbnail'); ?>">
							<div class="text-wrap">
								<h2><?php the_title(); ?></h2>
							</div>
						</div>
					</a>
				</div>
			<?php
			}  
		}
		?>
		</div>
		<figure id="text-divider-container">
			<img class="text-divider" src="<?php bloginfo('template_directory'); ?>/images/feed_divider.png" alt="divider">
		</figure>
	</div>
</main>

<?php get_footer(); ?>