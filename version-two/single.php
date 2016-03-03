<?php
/**
 * single.php
 * The template for displaying single posts.
 */
?>

<?php get_header(); ?>    
<div class="container">
    <div class="row">
       	<div class="single-content col-md-8 " role="main">
            <?php while( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>

                <?php comments_template(); ?>
            <?php endwhile; ?>
	    </div> <!-- end main-content -->
           <div class="sidebar">
               <?php get_sidebar(); ?>
           </div>
            
    </div>
</div>
<?php get_footer(); ?>