<?php
/**
 * The template for displaying all pages
 *
 * @package Raikot_Tours
 */

get_header();
?>

<div class="page-hero bg-[#1a2e44] py-32 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl font-bold text-white mb-4" data-aos="fade-up"><?php the_title(); ?></h1>
        <div class="w-20 h-1 bg-[#d4af37] mx-auto" data-aos="fade-up" data-aos-delay="100"></div>
    </div>
</div>

<div class="container mx-auto px-4 py-20">
    <div class="max-w-4xl mx-auto">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <div class="entry-content prose prose-lg max-w-none">
                <?php the_content(); ?>
            </div>
            <?php
        endwhile;
        ?>
    </div>
</div>

<?php
get_footer();
