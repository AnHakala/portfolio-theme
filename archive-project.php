<?php /* Template Name: Archive Project */ ?>

<?php get_header(); ?>

<?php
$query = new WP_Query( array( 'post_type' => 'wpp_projects' ) );
?>

<main id="site-main" role="main">
	<div class="text-container">
		<h1>My Projects</h1>
		<p>Testing to see where this text ends up</p>
	</div>
	<div class="project-container">
	<?php	
	if ($query -> have_posts()) {
		while ($query -> have_posts()) {
		?>
			<div class="single-container">
		<?php		
				$query -> the_post();
		?>
				<img class="image-container" src="<?php the_post_thumbnail_url(); ?>">
				<h2><?php the_title(); ?></h2>
			</div>
		<?php
		}  
	}
	?>
	</div>
</main>

<?php get_footer(); ?>