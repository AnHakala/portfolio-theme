<?php get_header(); ?>

<main id="site-main" role="main">
	<?php
	if( have_posts()) {
		while (have_posts()) { 
		?>
		<div class="article-container">
			<?php
			the_post();
			?>
			<h1 class="article-title"><?php the_title(); ?></h1>
			<article class="article-content"><?php the_content(); ?></article>
		</div>
		<?php
		}
	}
	?>	
</main>
	

<?php get_footer() ?>