<?php get_header(); ?>

<main id="site-main" role="main">
	<div id="feed-container">
		<div id="feed-title">
			<h1>Feed</h1>
			<figure id="text-divider-container">
				<img class="text-divider" src="<?php bloginfo('template_directory'); ?>/images/feed_divider.png" alt="divider">
			</figure>
		</div>
		<?php
		if(have_posts()) {
			while (have_posts()) { 
			?>
			<div class="feed-individual">
				<div class="article-container">
					<?php
					the_post();
					?>
					<h2 class="article-title"><?php the_title(); ?></h2>
					</br>
					<article class="article-content">
						<?php the_content(); ?>
					</article>
				</div>
				<figure class="text-divider-container">
					<img class="text-divider" src="<?php bloginfo('template_directory'); ?>/images/feed_divider.png" alt="divider">
				</figure>
				<?php
				}
			}
			?>
			</div>
	</div>
</main>
	

<?php get_footer() ?>