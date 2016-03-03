<?php 
/**
 * search.php
 *
 * The template for displaying search results.
 */
?>
<?php get_header(); ?>
<div class="container">
    <div class="row">
            <div class="main-content col-md-8" role="main">	
                <?php if ( have_posts() ) : ?>
                    <header class="page-header">
                        <h1>
                            <?php 
                                printf( __( 'Search Results for %s', 'versiontwo' ), get_search_query() );
                            ?>
                        </h1>
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