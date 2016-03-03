<?php 
/**
 * tag.php
 * The template for displaying tag pages.
 */
?>
<?php get_header(); ?>

    <div class="container">
        <div class="row">
            	<div class="tag-content col-md-8" role="main">
                    <?php if ( have_posts() ) : ?>
                        <header class="page-header">
                            <h1>
                            <h1>
                                <?php 
                                    printf( __( 'Tag Archives for %s', 'versiontwo' ), single_tag_title( '', false ) );
                                ?>
                            </h1>
                            <?php 
                                // Show an optional category description.
                                if ( tag_description() ) {
                                    echo '<p>' . tag_description() . '</p>';
                                }
                            ?>
                        </header>

                        <?php while( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php endwhile; ?>

                        <?php page_navi(); ?>
                    <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                    <?php endif; ?>
	        </div> <!-- end main-content -->
                    <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>