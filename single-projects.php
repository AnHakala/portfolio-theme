<?php /* Template Name: Single Project */ ?>

<?php get_header('simple'); ?>

<main id="site-main" role="main">
	<?php
	if(have_posts()) {
		while (have_posts()) { 
			the_post();
			?>
			<div class="button-container">
				<a class="button-title" href="javascript:history.back()">
					<button class="button-redirect">🡠 RETURN</button>
				</a>
			</div>
			<section class="single-project-container">
				<!-- Reveals the post thumbnail
				<img class="single-project-image-container" src="<?php the_post_thumbnail_url(); ?>">
				-->
				<div id="single-project-info-container">
					<div class="single-project-text-container">
						<h1 class="article-title"><?php the_title(); ?></h1>	
						<?php the_content(); ?>	
					</div>
					<div class="taxonomies-container">
						<div class="individual-taxonomy-container">	
								<h3 class="taxonomy-title">Project Type</h3>
							<?php
								$terms = get_the_terms( get_the_ID(), 'projects_type' );
								if ($terms) {
									foreach ($terms as $term) { ?>
										<p class="taxonomy-text"> <?php echo $term -> name; ?> </p>
									<?php
									}
								}
								else { ?>
									<p> <?php echo "No type has been selected."; ?> </p>
								<?php
								}
							?>
						</div>
						<div class="individual-taxonomy-container">	
							<h3 class="taxonomy-title">Project Skills</h3>
							<?php
								$terms = get_the_terms( get_the_ID(), 'projects_skill' );
								if ($terms) {
									foreach ($terms as $term) { ?>
										<p class="taxonomy-text"> <?php echo $term -> name; ?> </p>
									<?php
									}
								}
								else { ?>
									<p> <?php echo "No skill has been selected."; ?> </p>
								<?php
								}
							?>
						</div>
					</div>
				</div>
			</section>
			<div class="button-container">
				<a class="button-title" href="javascript:history.back()">
					<button class="button-redirect">🡠 RETURN</button>
				</a>
			</div>
		<?php
		}
	}
	?>	
</main>


<?php get_footer(); ?>
