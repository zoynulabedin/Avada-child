<?php 
/*

Template Name:Projects
 */
get_header();
 ?>

<div class="project-box">
	<?php
    $proj = new WP_Query(array(
        'post_type' => 'project',
        'posts_per_page'=>4,
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

 <?php get_footer();?>
