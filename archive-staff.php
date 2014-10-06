<?php get_header(); ?>

<section class="primary-content">
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
</section>

<?php get_footer(); ?>
