<?php
/**
 * The index template file.
 *
 * If the user has selected a page for which no other template exists, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom WP Theme
 */

 get_header();
 ?>
 <div class="content-container">
    <div class="index-container">
        <?php while( have_posts() ):
            the_post();
            get_template_part('blog-post-card'); ?>
        <?php endwhile; ?>
        
    </div>
</div>

 <?php get_footer(); ?>