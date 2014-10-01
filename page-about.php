<?php 
/*
	Template Name: About Page
*/

?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article role="main" class="primary-content type-page" id="post-<?php the_ID(); ?>">
        <?php if ( is_front_page() ) { ?>
            <h1><?php the_title(); ?></h1>
        <?php } else { ?>
            <h1><?php the_title(); ?></h1>
        <?php } ?>

        <?php the_content(); ?>

        <div class="call-to-action">
	        <a href="#" class="button">Book Your Event</a>
        </div>

		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>

        <?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>

        <?php endwhile; ?>
    </article>

<?php get_footer(); ?>
