<?php 
/**
 * The main template file.
 */
get_header(); ?>
        <div class="blog-content main" role="main">
        <div class="container">
           
                <div class="col-md-8">
                        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php endwhile; ?>
                        
                        <?php page_navi(); ?>

                        <?php else : ?>
                            <?php get_template_part( 'content', 'none' ); ?>
                        <?php endif; ?>
                    
                </div>
                <div class="sidebar">                   
                        <?php get_sidebar(); ?>                 
                </div>
          
        </div>
    </div> 
<?php get_footer(); ?>