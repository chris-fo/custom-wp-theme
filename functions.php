<?php
function customwptheme_styles() {
    wp_enqueue_style('customwptheme-main-style', trailingslashit(get_stylesheet_directory_uri()) . 'style.css',
     array(), false, 'all');
    
}
add_action( 'wp_enqueue_scripts', 'customwptheme_styles' );

function customwptheme_scripts() {
    wp_enqueue_script('customwptheme-fa-icons', 'https://kit.fontawesome.com/25ba644359.js',
     array(), false, false);
    wp_enqueue_script('customwptheme-main-js', trailingslashit(get_stylesheet_directory_uri()) . 'assets/js/main.js',
     array( 'jquery' ), null, false);
}
add_action( 'wp_enqueue_scripts', 'customwptheme_scripts' );

function customwptheme_theme_setup() {
    // Add <title> tag support
    add_theme_support( 'title-tag' );
    // Add Custom Menu support
    add_theme_support( 'menus' );
    // Add Featured Image support
    add_theme_support( 'post-thumbnails' );
    // Register Navigation Menu
    register_nav_menus( array(
        'header' => 'Header Menu',
    ));
}
add_action( 'after_setup_theme', 'customwptheme_theme_setup' );

add_action ( 'init', function() {
    if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {
        echo "<script type='text/javascript'>alert('Enter Post validation');</script>";
        // Do some minor form validation to make sure there is content
        if ( $_POST['title'] == '' ) {
            return;
        } 
        echo "<script type='text/javascript'>alert('Title is set');</script>";
        // Check that the nonce was set and valid
        if( !wp_verify_nonce($_POST['_wpnonce'], 'new-post') ) {
            echo 'Did not save because your form seemed to be invalid. Sorry';
            return;
        }

        

        echo "<script type='text/javascript'>alert('Trying to insert post');</script>";
        // Add the content of the form to $post as an array
        $new_post = array(
            'post_title'    => $_POST['title'],
            'post_content'  => $_POST['content'],
            // 'post_date' => date( 'Y-m-d', time() ),
            'post_category' => array($_POST['cat']),  // Usable for custom taxonomies too
            // 'tags_input'    => array($tags),
            'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
            'post_type' => 'post'  //'post',page' or use a custom post type if you want to
        );

        //save the new post
        $post_id = wp_insert_post($new_post);
        echo 'Saved your post successfully! :)';

        print_r($_FILES);

        // Check image filetype
        if ( isset($_FILES['image-upload'] )) {
            $wp_filetype = wp_check_filetype( $_FILES['image-upload']['tmp_name'], null );
        }

        echo 'Filetype: '.$wp_filetype['type'];

        $attachment_data = array(
            'post_title' => sanitize_file_name( preg_replace( '/\.[^.]+$/', '', $_FILES['image-upload']['name'] ) ),
            'post_content' => '',
            'post_status' => 'inherit',
            'post_parent'    => $post_id
        );

        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php');

        $attach_id = media_handle_upload('image-upload', $post_id, $attachment_data);

        $success = set_post_thumbnail( $post_id, $attach_id );

        wp_redirect( home_url() ); 
        exit;
    }
});