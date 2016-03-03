<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <![endif]-->       
    
    <?php wp_head(); ?>
</head><!--/head-->

<body <?php body_class(); ?>>

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 00000</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li id="facebook"><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
                                <li id="twitter"><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                                <li id="google"><a href="#"><i class="fa fa-google-plus fa-2x"></i></a></li> 
                            </ul>              
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">         <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                  		
                    <?php if ( get_header_image() ) : ?><!-- Header Image or Site title and Description -->
                        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img class="img-responsive" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
                        </a>
                    
                     <?php else : ?>  
                 
				        <h1 class="navbar-brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    
                      <?php $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) { ?>
                                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                            <?php } ?>
                 
			         <?php endif; ?>

                  
                  
                   
                </div><!-- end of navbar-header -->
 
                <div class="collapse navbar-collapse navbar-right">
                    <?php
                        if (function_exists('wp_nav_menu')) {
                            wp_nav_menu(array('theme_location' => 'primary',
                                               'menu_class'     => 'nav navbar-nav',
                                           
                                              'fallback_cb'    => 'hk_media_menu',
                                              'walker'=> new wp_bootstrap_navwalker()

                                             ));
                        } ?>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
</header><!--/header-->