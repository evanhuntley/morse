<?php get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <article role="main" class="primary-content type-post" id="post-<?php the_ID(); ?>">

			<div class="profile-img">
				<?php the_post_thumbnail('full');?>
			</div>
			
			<?php the_content(); ?>

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