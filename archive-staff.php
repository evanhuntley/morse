<?php get_header(); ?>

<article class="primary-content">
	<section class="quote">
		<?php
			$quote_block_title = ot_get_option('staff_archive_quote_title');
			$quote_block_text = ot_get_option('staff_archive_quote_text');			
		?>
		<h2><?php echo $quote_block_title; ?></h2>
		<p><?php echo $quote_block_text; ?></p>
	</section>

<?php if ( $wp_query->have_posts() ) : ?>
	<ul class="staff-list">
		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();  ?>
			<li>
				<h2>
					<a href="<?php echo get_the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
						<span><?php the_title(); ?></span>
					</a>
				</h2>
			</li>
		<?php endwhile; ?>
	</ul>
<?php endif; ?>

    <div class="call-to-action">
        <a href="http://www.djmikemorse.djintelligence.com/booking" class="button">Book Your Event</a>
    </div>


</article>

<?php get_footer(); ?>
