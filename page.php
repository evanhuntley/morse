<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article role="main" class="primary-content type-page" id="post-<?php the_ID(); ?>">
    	<section class="quote">
    		<?php
				$quote_block_title = types_render_field("quote_block_title", array('raw'=>true));
				$quote_block_text = types_render_field("quote_block_text", array('raw'=>true));  			
    		?>
    		<h2><?php echo $quote_block_title; ?></h2>
    		<blockquote><?php echo $quote_block_text; ?></blockquote>
    	</section>
		
		<section class="main-content">
	        <?php if ( is_front_page() ) { ?>
	            <h1><?php the_title(); ?></h1>
	        <?php } else { ?>
	            <h1><?php the_title(); ?></h1>
	        <?php } ?>
	
	        <?php the_content(); ?>
		</section>
        
        <div class="call-to-action">
	        <a href="http://www.djmikemorse.djintelligence.com/contact/" class="button">Book Your Event</a>
        </div>

		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>

        <?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>

        <?php endwhile; ?>
    </article>

<?php get_footer(); ?>
