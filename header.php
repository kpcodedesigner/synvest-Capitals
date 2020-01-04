<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
		<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css" />
        
        
        <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>

    <body>
        <header class="desktop_view">
            <div class="header_top">
                <span><?php echo of_get_option('header_top_lable'); ?></span>
            </div>
            <div class="header_bottom">          
                <div class="container">
                    <div class="header_left"> 
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo of_get_option('header_logo'); ?>" class="img-responsive" alt="header logo"/> 
                        </a>
                    </div>
                    <div class="header_right"> 
                        <div class="header_right_top">
                            <div class="header_right_top_left">
                                <ul>
                                    <li><a href="#" data-toggle="modal" data-target="#myFCModal"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo of_get_option('add_free_consultation'); ?></a></li>
                                    <li><a href="tel:<?php echo of_get_option('add_phone_number'); ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo of_get_option('add_phone_number'); ?></a></li>
                                </ul>
                            </div>
                            <div class="header_social_icons">
                                <ul>
                                    <li><a href="<?php echo of_get_option('twitter_url'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo of_get_option('facebook_url'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo of_get_option('linkedin_url'); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo of_get_option('skype_url'); ?>" target="_blank"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo of_get_option('youtube_url'); ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header_right_bottom"> 
                            <?php wp_nav_menu(array('menu' => 'Header Menu')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>



        <header class="mobile_view">
            <div class="header_top">
                <span><?php echo of_get_option('header_top_lable'); ?></span>
            </div>
            <div class="header_bottom">          
                <div class="container">
                    <div class="header_left"> 
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo of_get_option('header_logo'); ?>" class="img-responsive" alt="header logo"/> 
                        </a>
                    </div>
                    <div class="header_right">                         
                        <div class="header_right_bottom"> 
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <nav class="navbar">
                                <div class="collapse navbar-collapse" id="mynavbar">
                                    <?php wp_nav_menu(array('menu' => 'Header Menu')); ?>
                                </div>
                            </nav>
                        </div>
                                <div class="header_right_top">
                                    <div class="header_right_top_left">
                                        <ul>
                                            <li><a href="mailto:"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo of_get_option('add_free_consultation'); ?></a></li>
                                            <li><a href="tel:<?php echo of_get_option('add_phone_number'); ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo of_get_option('add_phone_number'); ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="header_social_icons">
                                        <ul>
                                            <li><a href="<?php echo of_get_option('twitter_url'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo of_get_option('facebook_url'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo of_get_option('linkedin_url'); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo of_get_option('skype_url'); ?>" target="_blank"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo of_get_option('youtube_url'); ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
        </header>






