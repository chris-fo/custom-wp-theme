<?php
/**
 * The home page template file.
 *
 * If the user has selected a blog page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom WP Theme
 */

get_header();
?>
<div class="content-container">
    <div class="home-form-container">
        <?php get_template_part('post-form'); ?>
    </div>
    <div class="home-posts-container">
        <?php 
        $post_counter = 0;
        while( have_posts() ):
            the_post();
            get_template_part('blog-post-card' , \null, array($post_counter)); 
            $post_counter++;
        endwhile; ?>
        <div class="button-container">
            <?php if ($post_counter > 4) : ?>
                <input type="button" class="customwptheme-button show-more" value="Meer laden" onclick="load_more()">
            <?php endif ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>