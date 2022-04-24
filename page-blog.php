<?php
/**
 * The blog template file.
 *
 * If the user has selected a page naemd blog, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom WP Theme
 */

 get_header();
 ?>
 <div class="content-container">
    <div class="blog-posts-container">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'posts_per_page' => 8,
            'post_type'      => 'post',
            'paged'          => $paged,
        );
        $query = new WP_Query( $args );
        while( $query->have_posts() ):
            $query->the_post();
            get_template_part('blog-post-card');
        endwhile; ?>
        <nav>
        <?php
        echo paginate_links( array(
            'total'     => $query->max_num_pages,
            'mid_size'  => 2,
            'prev_text' => '',
            'next_text' => __( 'Volgende pagina&nbsp;&nbsp&nbsp;<i class="fa-solid fa-arrow-right-long fa-xs"></i>' )
        ));
        ?>
        </nav>
    </div>
    
</div>

 <?php get_footer(); ?>