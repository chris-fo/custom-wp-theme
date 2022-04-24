<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 */
?>
<!Doctype html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site base-font">
	<div class="header">
        <a href="<?php echo home_url() ?>"><img class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/SBlogo.svg' ?>" alt="A Logo"></a>
        <nav class="navigation">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'header',
                ));
            ?>
        </nav>
        <?php if (!is_home() && !is_author() &&! is_single() && !is_page() && !is_category()):  ?>
            <h1 class="page-title">Archive</h1>
        <?php elseif (is_category()):  ?>
            <h1 class="page-title">Category: <?php echo get_the_category()[0]->cat_name ?></h1>
        <?php elseif (is_author()):  ?>
            <h1 class="page-title">Articles by <?php the_author() ?></h1>
        <?php elseif (!is_home()):  ?>
            <h1 class="page-title"><?php the_title();?></h1>
        <?php endif ?>
        
    </div>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
