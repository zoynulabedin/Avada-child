<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:



if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'avada-stylesheet' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
         wp_enqueue_style('owl-carusel-child',get_stylesheet_directory_uri().'/assets/css/owl.carousel.min.css');
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'chld_thm_cfg_parent' ) );

          wp_enqueue_script('owl-carusel-js',get_stylesheet_directory_uri().'/assets/js/owl.carousel.min.js',array('jquery'),'1.0',true);
     wp_enqueue_script('masonry-js',get_stylesheet_directory_uri().'/assets/js/masonry.pkgd.min.js',array('jquery'),'1.0',true);
     wp_enqueue_script('custom-js',get_stylesheet_directory_uri().'/assets/js/custom.js',array('jquery'),'1.0',true);
    }
endif;



add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

function wf_section_title_fun($atts,$content){ 
	ob_start();
	$section_title = extract(shortcode_atts( array(
		'behind_title' => ' ',
		'front_title' =>' ',
        'behind_title_color' =>' ',
        'front_title_color' =>' '
		
	),$atts ));
	?>

<div class="wf-section-title">
    <div class="behind-title">
        <h1 style="color:<?php echo $behind_title_color;?>" class="behind-heading"><?php echo $behind_title;?></h1>
    </div>
    <h4 style="color: <?php echo $front_title_color;?>" class="front-title"><?php echo $front_title;?></h4>
</div>
   

   
<?php
return ob_get_clean();
 }
add_shortcode('wf_section_title','wf_section_title_fun');

// projects

function wf_project_slider_fun($atts,$content){ 
    ob_start();
    $section_title = extract(shortcode_atts( array(
        'count' => 2,
        
        
    ),$atts ));
    ?>

<div class="project-slider owl-carousel">
<?php
    $proj = new WP_Query(array(
        'post_type' => 'project',
        'posts_per_page'=>-1,
    ));
 while($proj->have_posts()):$proj->the_post(); ?>
    <div class="single-project single-item" style="background-image:url(<?php the_post_thumbnail_url() ?>);">
        <div class="overlay-bg"></div>
        <div class="project-content">
            <?php $catt =  get_categories(); ?>
            <div class="project-cat"><h3><?php the_category(); ?></h3></div>
            <div class="project-title"><h2><?php the_title(); ?></h2></div>
            <a href="<?php the_permalink(); ?>" class="project-btn">View Story</a>
        </div>
    </div>
    <?php endwhile; wp_reset_query(); ?>
</div>
   

   
<?php
return ob_get_clean();
 }
add_shortcode('wf_project_slider','wf_project_slider_fun');




function wf_project_grid_fun($atts,$content){ 
    ob_start();
    $section_title = extract(shortcode_atts( array(
        'count' => 4,
        
        
    ),$atts ));
    ?>

<div class="project-box">
    <?php
    $proj = new WP_Query(array(
        'post_type' => 'project',
        'posts_per_page'=>$count,
    ));
 while($proj->have_posts()):$proj->the_post(); ?>
    <div class="single-project single-item" style="background-image:url(<?php the_post_thumbnail_url() ?>);">
        <div class="overlay-bgs"></div>
        <div class="project-content">
            <?php $catt =  get_categories(); ?>
            <div class="project-cat"><h3><?php the_category(); ?></h3></div>
            <div class="project-title"><h2 style="color: #091838"><?php the_title(); ?></h2></div>
            <a href="<?php the_permalink(); ?>" style="color:#091838;" class="project-btn">View Story</a>
        </div>
    </div>
    <?php endwhile; wp_reset_query(); ?>
</div>

   
<?php
return ob_get_clean();
 }
add_shortcode('wf_project_grid','wf_project_grid_fun');


function cptui_register_my_cpts_project() {

    /**
     * Post Type: Project.
     */

    $labels = [
        "name" => __( "Project", "custom-post-type-ui" ),
        "singular_name" => __( "Project", "custom-post-type-ui" ),
    ];

    $args = [
        "label" => __( "Project", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "project", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail" ],
        "taxonomies" => [ "category" ],
    ];

    register_post_type( "project", $args );
}

add_action( 'init', 'cptui_register_my_cpts_project' );


// project single pages css
add_action('wp_head','project_single_pages_css');

function project_single_pages_css(){
if(is_singular( 'project' )){
    ?>

<style>
 .fusion-page-title-bar.fusion-page-title-bar-breadcrumbs.fusion-page-title-bar-center {
    display: none;
}
main#main {
    margin: 0;
    padding: 0;
}
html:not(.avada-has-site-width-percent) #main, html:not(.avada-has-site-width-percent) .fusion-footer-copyright-area, html:not(.avada-has-site-width-percent) .fusion-footer-widget-area, html:not(.avada-has-site-width-percent) .fusion-sliding-bar-position-bottom .fusion-sliding-bar, html:not(.avada-has-site-width-percent) .fusion-sliding-bar-position-top .fusion-sliding-bar, html:not(.avada-has-site-width-percent) .tfs-slider .slide-content-container{
    padding-right: 0;
    padding-left: 0;
}   
}
</style>
<?php } }

