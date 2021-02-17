<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<?php
$args = array(
    'post_type'              => 'projects',
    'post_status'            => 'publish',
    'posts_per_page'         => 3,
);

$query = new WP_Query($args);
?>

<main id="site-main" role="main">
	<section class="heading-container">
		<div class="heading-information">
			<div id="heading-text-container">
				<h1 id="heading-title">GREETINGS</h1>
				<p id="heading-text">Youve made it to my personal portfolio</p>
			</div>
			<div id="heading-button-container">
				<a class="button-title" href="wordpress/projects">
					<button id="heading-button">BROWSE</button>
				</a>
			</div>
		</div>
	</section>
	<section id="about-me-container">
		<div class="frontpage-title-container">
			<h1>About me</h1>
		</div>
		<div class="fade-in">			
			<figure id="text-divider-container">
				<img class="text-divider" src="<?php bloginfo('template_directory'); ?>/images/feed_divider.png" alt="divider">
			</figure>
			<figure id="about-me-picture-container">
				<img id="about-me-picture" src="<?php bloginfo('template_directory'); ?>/images/aboutme_image.png" alt="myself">
			</figure>
			<figure id="text-divider-container">
				<img class="text-divider" src="<?php bloginfo('template_directory'); ?>/images/feed_divider.png" alt="divider">
			</figure>
		</div>
		<div id="about-me-text-container" class="fade-in">
			<p>
				As you've probably figured out already, my name is Andreas Hakala. I am a Graphic Designer and aspiring Front-end Developer in search for new challenges and opportunities that can bolster my progress and experience within those fields. As a person i tend to be quite detail oriented, organized, calm and easygoing with anything I do. My primary focuses as of recently involves Motion Graphics, UI/UX Design and Web Development.
			</p>
		</div>
	</section>
	<section id="recent-projects-container">
		<div class="frontpage-title-container">
			<h1>Recent Projects</h1>
		</div>
		<div class="frontpage-project-container fade-in">
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
		else {
			echo "There are no posts to be shown";
		}
		wp_reset_postdata();
		?>
		</div>
		<div class="button-container">
				<a class="button-title" href="wordpress/projects">
					<button class="button-redirect">BROWSE ALL PROJECTS</button>
				</a>
			</div>
	</section>
	<section id="contact-me-container">
		<div class="frontpage-title-container">
			<h1>Contact me</h1>
		</div>
		<div id="contact-form-container" class="fade-in">
			<?php $contact='[contact-form-7 id="125" title="Contact form 1"]'?>
			<?php echo do_shortcode($contact);?>
		</div>
	</section>
</main>

<?php get_footer(); ?>