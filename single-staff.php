<?php get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <article role="main" class="primary-content type-post" id="post-<?php the_ID(); ?>">

			<div class="profile-img">
				<?php the_post_thumbnail('full');?>
			</div>
			<div class="quote">
	    		<?php
					$quote_block_title = types_render_field("quote_block_title", array('raw'=>true));
					$quote_block_text = types_render_field("quote_block_text", array('raw'=>true));  			
	    		?>
				<a class="button" href="http://www.djmikemorse.djintelligence.com/availability">Check Availability</a>
				<h2><?php echo $quote_block_title; ?></h2>
				<blockquote><?php echo $quote_block_text; ?></blockquote>
			</div>
			
			<section class="main-content">
				<h1>About</h1>
				<?php the_content(); ?>
			</section>

            <ul class="navigation">
                <li class="older">
					<?php previous_post_link( '%link', '&larr; %title' ); ?>
                </li>
                <li class="newer">
					<?php next_post_link( '%link', '%title &rarr;' ); ?>
                </li>
            </ul>

            <?php endwhile; // end of the loop. ?>
        </article>

<?php get_footer(); ?>