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
    <div class="single-post-container">
        <?php
        while ( have_posts() ) {
            the_post();
            the_post_thumbnail('full');
            the_content();
            ?>
            <div class="post-info-container">
                <p>Author: <?php the_author_posts_link();  ?></p>
                <p>Datum: 
                <a href="<?php $date = explode('.', $currentday);
                echo get_day_link( $date[2], $date[1], $date[0] );  ?>">
                <?php 
                the_date();?></a></p>
            </div>
            <?php
        }
        ?>
    </div>
</div>

 <?php get_footer(); ?>