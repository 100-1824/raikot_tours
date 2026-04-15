<?php
/**
 * Front Page Template - Raikot Tours Premium Homepage
 *
 * This template displays the home page with the cluster carousel
 * replacing the "Raikot Signature" section.
 *
 * @package Twenty Twenty-Four
 */

get_header();
?>

<main id="main" class="site-main">
	<?php
	// Display the cluster carousel component
	get_template_part( 'template-parts/cluster-carousel' );
	?>
</main>

<?php
get_footer();
