
<div class='blog-post-card <?php if ($args && $args[0] > 3) echo 'hidden';?>'>
    <?php 
    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
    ?>
    <div class="post-card-header" style="background-image: url(<?php if ($featured_image) echo $featured_image[0];?>);">
        <span>
            <a href="<?php 
                $date = explode('-', get_the_date( 'd-m-Y' ));
                echo get_day_link( $date[0], $date[1], $date[2] );  ?>">
                <?php 
                echo get_the_date( 'd-m-Y' );
                ?>
            </a>
        </span>
        <span><?php the_category( ',' )?></span>
    </div>
    <div class="post-card-content">
        <div class="post-card-inner-content">
            <a href="<?php the_permalink() ?>"><h3><?php the_title() ?></h3></a>
            <?php the_content() ?>
        </div>
    </div>
</div>