<?php 
/*
	Template Name: Home Page
*/
	get_header(); 
?>

<section class="about">
	<?php
		$about_block_title = types_render_field("about_block_title", array('raw'=>true));
		$about_block_intro = types_render_field("about_block_intro", array('raw'=>true));
		$about_text = types_render_field("about_text", array('raw'=>true));
	?>
	<h1><?php echo $about_block_title; ?></h1>
	<p class="intro"><?php echo $about_block_intro; ?></p>
	<p><?php echo $about_text; ?></p>
	<p class="signature">Mike Morse</p>
	
</section>

<section class="services">
	<?php
		$svc_block1_title = types_render_field("svc_block1_title", array('raw'=>true));
		$svc_block1_text = types_render_field("svc_block1_text", array('raw'=>true)); 
		$svc_block1_url = types_render_field("svc_block1_url", array('raw'=>true)); 

		$svc_block2_title = types_render_field("svc_block2_title", array('raw'=>true));
		$svc_block2_text = types_render_field("svc_block2_text", array('raw'=>true)); 
		$svc_block2_url = types_render_field("svc_block2_url", array('raw'=>true)); 
		
		$svc_block3_title = types_render_field("svc_block3_title", array('raw'=>true));
		$svc_block3_text = types_render_field("svc_block3_text", array('raw'=>true)); 
		$svc_block3_url = types_render_field("svc_block3_url", array('raw'=>true)); 
	?>
	<ul>
		<li>
			<h2><?php echo $svc_block1_title; ?></h2>
			<p><?php echo $svc_block1_text; ?></p>
			<a class="button" href="<?php echo $svc_block1_url; ?>">Learn More</a>
		</li>
		<li>
			<h2><?php echo $svc_block2_title; ?></h2>
			<p><?php echo $svc_block2_text; ?></p>
			<a class="button" href="<?php echo $svc_block2_url; ?>">Learn More</a>			
		</li>
		<li>
			<h2><?php echo $svc_block3_title; ?></h2>
			<p><?php echo $svc_block3_text; ?></p>
			<a class="button" href="<?php echo $svc_block3_url; ?>">Learn More</a>			
		</li>
	</ul>
</section>

<section class="testimonials">
	<?php
		$testimonial_block_title = types_render_field("testimonial_block_title", array('raw'=>true));
		$testimonial_block_subtitle = types_render_field("testimonial_block_subtitle", array('raw'=>true));
	?>
	<div class="subtitle"><?php echo $testimonial_block_subtitle; ?></div>
	<h1><?php echo $testimonial_block_title; ?></h1>
	<?php
		$testimonials = new WP_Query( array('post_type' => 'testimonials', 'posts_per_page' => 3, 'orderby' => 'rand') );
		if ( $testimonials->have_posts()) : 
	?>
	<ul class="slides">
		<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
		<li>
			<blockquote>
				<p>
				<?php
					$content = get_the_content(); 
					$trimmed_content = wp_trim_words( $content, 40, '<a href="'. get_permalink() .'"> ...Read More</a>' );
					echo $trimmed_content;
				?>
				</p>
				<cite><?php the_title(); ?></cite>
			</blockquote>
		</li>
		<?php endwhile; wp_reset_query(); ?>
	</ul>
	<?php endif; ?>
</section>

<section class="actions">
	<?php
		$action_block_title = types_render_field("ac_block_title", array('raw'=>true));
		$action_block_intro = types_render_field("ac_block_intro", array('raw'=>true));
		$action_text = types_render_field("ac_text", array('raw'=>true));
	?>
	<div class="block">
		<h1><?php echo $action_block_title; ?></h1>
		<p class="intro"><?php echo $action_block_intro; ?></p>
		<p><?php echo $action_text; ?></p>
		<a class="button" href="#">Book Your Event</a>
	</div>
	<div class="video">
		<a href="#" class="play">Play</a>
	</div>
</section>

<section class="staff">
	<?php
		$staff_block_title = types_render_field("staff_block_title", array('raw'=>true));
		$staff_subtitle = types_render_field("staff_subtitle", array('raw'=>true));
		$staff_text = types_render_field("staff_text", array('raw'=>true));	
		$staff_button_text = types_render_field("staff_button_text", array('raw'=>true));
	?>
	<div class="subtitle"><?php echo $staff_subtitle; ?></div>
	<h1><?php echo $staff_block_title; ?></h1>
	<p><?php echo $staff_text; ?></p>
	<a class="button" href="/staff/"><?php echo $staff_button_text; ?></a>
</section>


<?php get_footer(); ?>
