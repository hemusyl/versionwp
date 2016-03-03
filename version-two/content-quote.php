<?php
/* 
 * content-quote.php
 * @package versiontwo
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
            <?php
                /* translators: %s: Name of current post */
                the_content( sprintf(
                    __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'versiontwo' ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>

            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'versiontwo' ),
                    'after'  => '</div>',
                ) );
            ?>
	</div>
    <footer class="entry-footer">
        <p class="entry-meta">
			<?php 
				// Display the meta information
				versiontwo_post_meta();
			?>
		</p>
	</footer> <!-- end entry-footer -->
	
</article>