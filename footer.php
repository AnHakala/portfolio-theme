		<footer id="site-footer">
			<ul id="social-media-links-container">
				<li class="social-media-individual-container">
					<a href="#">
						<img class="social-media-logo" src="<?php bloginfo('template_directory'); ?>/images/behance.svg">
					</a>
				</li>
				<li class="social-media-individual-container">
					<a href="#">
						<img class="social-media-logo" src="<?php bloginfo('template_directory'); ?>/images/github.svg">
					</a>
				</li>
				<li class="social-media-individual-container">
					<a href="#">
						<img class="social-media-logo" src="<?php bloginfo('template_directory'); ?>/images/mail.svg">
					</a>
				</li>
				<li class="social-media-individual-container">
					<a href="#">
						<img class="social-media-logo" src="<?php bloginfo('template_directory'); ?>/images/linkedin.svg">
					</a>
				</li>
			</ul>
			<p id="footer-text">© Copyright - 2021 Andreas Hakala</p>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
jQuery(window).scroll(function() {
    jQuery('.fade-in').each(function() {
        var top_of_element = jQuery(this).offset().top;
        var bottom_of_element = jQuery(this).offset().top + jQuery(this).outerHeight();
        var bottom_of_screen = jQuery(window).scrollTop() + jQuery(window).innerHeight();
        var top_of_screen = jQuery(window).scrollTop();

        if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element) && !jQuery(this).hasClass('is-visible')) {
            jQuery(this).addClass('is-visible');
        }
    });
});
</script>
