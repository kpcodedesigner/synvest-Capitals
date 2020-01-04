<?php

function custom_navigation_menus() {

    $locations = array(
        'primary-menu' => __('Header_menu', 'synvest'),
        'footer-menu' => __('Footer_menu', 'synvest'),
    );
    register_nav_menus($locations);
}

add_action('init', 'custom_navigation_menus');
add_theme_support('customize-selective-refresh-widgets');
define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
require_once dirname(__FILE__) . '/inc/options-framework.php';

/* Register Navigation Menus end */
add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
));

// *************************               CSS/JQUERY             *******************
function load_synvest_scripts() {
// Theme stylesheet.
    wp_enqueue_style('synvest-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/font-awesome.css', array(), '20141010', false);
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), '20181120');
    wp_enqueue_style('resposive', get_template_directory_uri() . '/css/responsive.css', array(), '20160412');
}

add_action('wp_enqueue_scripts', 'load_synvest_scripts');

function synvest_scripts() {
    wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery.min.js');
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js');
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js');
        wp_enqueue_script('jquery-isotop', get_template_directory_uri() . '/js/isotop.js');
    wp_enqueue_script('jquery-custom', get_template_directory_uri() . '/js/custom.js');
}

add_action('wp_footer', 'synvest_scripts');

//** Visual Composer **//


function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if ($tag == 'vc_row' || $tag == 'vc_row_inner') {
        $classNames = ['wpb_row', 'vc_row-fluid', 'vc_row'];

        foreach ($classNames as $className)
            $class_string = str_replace($className, '', $class_string);

        $class_string = ('row' . ($class_string ? ' ' : '') . trim($class_string)); // This will replace "vc_row-fluid" with "my_row-fluid"
    }

    if ($tag == 'vc_section') {
        $classNames = ['vc_section'];

        foreach ($classNames as $className)
            $class_string = str_replace($className, '', $class_string);

        $class_string = ('section' . ($class_string ? ' ' : '') . trim($class_string)); // This will replace "vc_row-fluid" with "my_row-fluid"
    }

    if ($tag == 'vc_column' || $tag == 'vc_column_inner') {
        $classNames = ['wpb_column', 'vc_column_container'];

        foreach ($classNames as $className)
            $class_string = str_replace($className, '', $class_string);

        $cols = ['col-xs-offset-', 'col-xs-', 'col-sm-offset-', 'col-sm-', 'col-md-offset-', 'col-md-', 'col-lg-offset-', 'col-lg-'];
        foreach ($cols as $col) {
            $num = 0;

            if (preg_match('/vc_' . $col . '(\d{1,2})/', $class_string, $regs)) {
                $num = (int) str_replace(('vc_' . $col), '', $regs[0]);
            }

            $class_string = preg_replace('/vc_' . $col . '(\d{1,2})/', ($col . ($num * ($num < 12 ? 1 : 1))), $class_string); // This will replace "vc_col-sm-%" with "my_col-sm-%"
        }
    }

    return $class_string; // Important: you should always return modified or original $class_string
}

add_filter('plugin_row_meta', 'cx_uvcftbt_plugin_row_meta', 10, 2);
add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);

function mytheme_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget', 'synvest'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentyfifteen'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Fotter Bottem Copyrights', 'synvest'),
        'id' => 'sidebar-2',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentyfifteen'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'mytheme_widgets_init');

function create_post_type_testimonial() {
    register_post_type('acme_product', array(
        'labels' => array(
            'name' => __('Testimonial'),
            'singular_name' => __('Testimonial')
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('genres'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
            )
    );
}

add_action('init', 'create_post_type_testimonial');

function create_post_type_samples() {
    register_post_type('acme_product_1', array(
        'labels' => array(
            'name' => __('Samples'),
            'singular_name' => __('Samples')
        ),
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'public' => true,
        'has_archive' => true,
            )
    );
}

add_action('init', 'create_post_type_samples');

function home_page_testimonial() {
    $out = "";
    $args = array(
        'post_type' => 'acme_product',
        'posts_per_page' => 3
    );
    $out .= '<div class="row">';
    $obituary_query = new WP_Query($args);
    while ($obituary_query->have_posts()) : $obituary_query->the_post();
        $out .= '<div class="col-sm-4">';
        $out .= '<div class="home_testimonial_box">';
        $out .= '<ul>';
        $rating = get_field('rating');
        for ($x = 0; $x < $rating; $x++) {
            $out .= '<li><i class="fa fa-star star_yellow" aria-hidden="true"></i></li>';
        }
        $new_rating = 5 - $rating;
        for ($y = 0; $y < $new_rating; $y++) {
            $out .= '<li><i class="fa fa-star star_no_color" aria-hidden="true"></i></li>';
        }
        $out .= '</ul>';
        $out .= '<p>' . get_the_content() . '</p>';
        $out .= '<div class="home_testimonial_img">';
        $out .= '<img src="' . get_the_post_thumbnail_url() . '" />';
        $out .= '</div>';
        $out .= ' <h4>' . get_the_title() . '</h4>';
        $out .= '</div>';
        $out .= '</div>';


        wp_reset_postdata();
    endwhile;
    $out .= '</div>';
    return $out;
}

add_shortcode('home_page_testimonial', 'home_page_testimonial');

function home_page_samples() {
    $out = "";
    $args = array(
        'post_type' => 'acme_product_1',
        'posts_per_page' => 4,
        'order' => 'ASC'
    );
    $count = 0;
    $count1 = 0;
    $out .= '<div class="row">';
    $obituary_query = new WP_Query($args);
    while ($obituary_query->have_posts()) : $obituary_query->the_post();
        $out .= '<div class="col-sm-3">';
        $out .= '<div class="homepage_samples_box">';
        $out .= '<img src="' . get_the_post_thumbnail_url() . '" />';
        $out .= ' <a href="#" data-toggle="modal" data-target="#pdf' . $count . '">' . get_the_title() . '</a>';
        $sample_pdf = get_field('sample_pdf_file');
        $out .= '</div>';
        $out .= '</div>';
        $out .= '<div id="pdf' . $count1 . '" class="modal fade" role="dialog">';
        $out .= '<div class="modal-dialog modal-lg">';
        $out .= '<div class="modal-content">';
        $out .= '<div class="modal-header">';
        $out .= ' <button type="button" class="close" data-dismiss="modal">&times;</button>';
        $out .= ' </div>';
        $out .= ' <div class="modal-body">';
        $out .= '<embed src="' . $sample_pdf . '"  frameborder="0" width="100%" height="500px">';
        $out .= '   </div>';
        $out .= '  </div>';
        $out .= ' </div>';
        $out .= '</div>';


        $count++;
        $count1++;
        wp_reset_postdata();
    endwhile;

    $out .= '</div>';
    return $out;
}

add_shortcode('home_page_samples', 'home_page_samples');

function home_page_blog() {
    $out = "";
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'order' => 'ASC'
    );
    $out .= '<div class="row">';
    $obituary_query = new WP_Query($args);
    while ($obituary_query->have_posts()) : $obituary_query->the_post();
        $out .= '<div class="col-sm-3">';
        $out .= '<div class="homepage_blog_box">';
        $out .= '<img src="' . get_the_post_thumbnail_url() . '" />';
        $out .= '<div class="homepage_blog_text">';
        $out .= ' <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
        $out .= ' <span>' . get_the_date('d M Y') . '</span>';
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
        wp_reset_postdata();
    endwhile;
    $out .= '</div>';
    return $out;
}

add_shortcode('home_page_blog', 'home_page_blog');

// Register Custom Post Type
function custom_post_type_project() {

    $labels = array(
        'name' => _x('Project', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Project', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Project', 'text_domain'),
        'name_admin_bar' => __('Project', 'text_domain'),
        'archives' => __('Project Archives', 'text_domain'),
        'attributes' => __('Project Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Project:', 'text_domain'),
        'all_items' => __('All Project', 'text_domain'),
        'add_new_item' => __('Add New Project', 'text_domain'),
        'add_new' => __('Add New', 'text_domain'),
        'new_item' => __('New Project', 'text_domain'),
        'edit_item' => __('Edit Project', 'text_domain'),
        'update_item' => __('Update Project', 'text_domain'),
        'view_item' => __('View Project', 'text_domain'),
        'view_items' => __('View Project', 'text_domain'),
        'search_items' => __('Search Project', 'text_domain'),
        'not_found' => __('Not found', 'text_domain'),
        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Project', 'text_domain'),
        'description' => __('Project Description', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'author', 'thumbnail','excerpt'),
        'taxonomies' => array('project', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'taxonomies' => array('category'),
    );
    register_post_type('project', $args);
}

add_action('init', 'custom_post_type_project');


add_image_size( 'project-image', 573, 376, true ); 
add_image_size( 'project-img', 1920, 640, true ); 