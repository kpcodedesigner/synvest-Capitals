<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>

<div class= "contact_section background_banner">
    <div class="container opcity">
        <div class="">
            <div class="contact_contain error_section">
                <div class="col-sm-12">
                    <div class="error_page">                        
                        <div class="error_text">
                            <label>404</label>
                            <p>Page Not Found</p>
                            <a href="<?php echo get_site_url(); ?>">Back to home <i class="ion-ios-arrow-thin-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
