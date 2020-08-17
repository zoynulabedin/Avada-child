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
    <div class="single-project" style="background-image:url(<?php the_post_thumbnail_url() ?>);">
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
    <div class="single-project" style="background-image:url(<?php the_post_thumbnail_url() ?>);">
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


