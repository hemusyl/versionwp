<?php 
/**
 * archive.php
 *
 * The template for displaying archive pages.
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
						if ( is_day() ) {
							printf( __( 'Daily Archives for %s', 'versiontwo' ), get_the_date() );
						} elseif ( is_month() ) {
							printf( __( 'Monthly Archives for %s', 'versiontwo' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'versiontwo' ) ) );
						} elseif ( is_year() ) {
							printf( __( 'Yearly Archives for %s', 'versiontwo' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'versiontwo' ) ) );
						} else {
							_e( 'Archives', 'versiontwo' );
						}
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