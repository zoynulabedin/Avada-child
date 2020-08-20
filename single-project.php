<?php 
get_header();?>
<div class="project-single-hero-section">
	<div class="project-single-hero" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>);">
		  <div class="overlay-bgs"></div>
		<div class="project-single-content">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</div>
<div class="project-hero-bottom-section">
	<div class="wf-info-box">
		<?php $repp = get_field('repeater_text');
		foreach($repp as $sin):
		?>
		<div class="wf-single-info">
			<h3><?php echo $sin['title'] ?> <span><?php echo $sin['sub_title'] ?></span></h3>
		</div>
	<?php endforeach; ?>
	</div>
</div>
<div class="wf-project-single-content-sec">
	<div class="wf-section-title">
    <div class="behind-title">
        <h1 class="behind-heading">Description</h1>
    </div>
    <h4 class="front-titles">Project Snapshot</h4>
</div>
<div class="wf-content-details">
	<?php the_content(); ?>
</div>
</div>




<div class="imageGallery1">
	  <?php $gall = get_field('gallery');

  foreach ($gall as $gall_url):
   ?>
    <a href="<?php echo $gall_url; ?>"><img src="<?php echo $gall_url; ?>" alt="" /></a>
    <?php endforeach; ?>
</div>

<?php get_footer();?>


