<?php
/**
 * The main template file
 *
 * @package Raikot_Tours
 */

get_header();
?>

<div class="container mx-auto px-4 py-20">
    <header class="page-header mb-12 text-center">
        <h1 class="text-4xl font-bold mb-4"><?php _e( 'Latest News', 'raikot-tours' ); ?></h1>
        <div class="w-20 h-1 bg-[#d4af37] mx-auto"></div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'glass-card overflow-hidden group' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail overflow-hidden">
                            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="p-8">
                        <div class="post-meta text-xs text-[#d4af37] uppercase tracking-widest mb-3">
                            <?php echo get_the_date(); ?>
                        </div>
                        <h2 class="text-xl font-bold mb-4">
                            <a href="<?php the_permalink(); ?>" class="hover:text-[#d4af37] transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="post-excerpt text-gray-600 mb-6">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text-sm font-bold text-[#1a2e44] hover:text-[#d4af37] transition-colors flex items-center">
                            <?php _e( 'Read More', 'raikot-tours' ); ?>
                            <span class="dashicons dashicons-arrow-right-alt2 ml-2"></span>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>

            <div class="col-span-full mt-12">
                <?php the_posts_navigation(); ?>
            </div>

        <?php else : ?>
            <div class="col-span-full text-center py-20">
                <p><?php _e( 'No posts found.', 'raikot-tours' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
