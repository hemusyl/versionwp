<?php
/* 
 * content.php
 * @package versiontwo
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	 <?php
		// If the post has a thumbnail and it's not password protected
		// then display the thumbnail
		if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<figure class="entry-thumbnail"><?php the_post_thumbnail('large'); ?></figure>
		<?php endif; ?>
		
		<?php
        // If single page, display the title
		// Else, we display the title in a link
		if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif; ?>
       				
		<p class="entry-meta">
			<?php 
				// Display the meta information
				versiontwo_post_meta();
			?>
		</p>
	</header> <!-- end entry-header -->	
  	
   	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
    <div class="entry-content">
            <?php
                /* translators: %s: Name of current post */
                the_content( sprintf(
                    __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'versiontwo' ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
          
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'versiontwo' ),
                    'after'  => '</div>',
                    
                ) );
            ?>
	</div>
    <?php endif; ?>	
    <hr class="fancy-hr" />
    <footer class="entry-footer">
		<?php 
			// If we have a single page and the author bio exists, display it
			if ( is_single() && get_the_author_meta( 'description' ) ) {
				echo '<h2>' . __( 'Written by ', 'versiontwo' ) . get_the_author() . '</h2>';
				echo '<p>' . the_author_meta( 'description' ) . '</p>';
			}
		?>
	</footer> <!-- end entry-footer -->	
</article>