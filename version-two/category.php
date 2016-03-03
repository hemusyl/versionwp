<?php
/**
 * category.php
 * The template for displaying category pages.
 */
?>
<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="category-content col-md-8" role="main">
                <?php if ( have_posts() ) : ?>
                    <header class="page-header">
                        <h1>
                        <h1>
                            <?php 
                                printf( __( 'Category Archives for %s', 'versiontwo' ), single_cat_title( '', false ) );
                            ?>
                        </h1>

                        <?php 
                            // Show an optional category description.
                            if ( category_description() ) {
                                echo '<p>' . category_description() . '</p>';
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
	        <div class="sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>


<?php get_footer(); ?>