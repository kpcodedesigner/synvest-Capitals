<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
?>
<div class="project_inner_main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="project_inner">
                <div class="project_inner_img">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('project-img');
                    }
                    ?>
                </div>
                <div class="project_inner_box">
                    <div class="project_inner_content">
                        <div class="project_inner_title">
                            <h2><?php echo get_the_title(); ?></h2>
                        </div>
                        <?php the_content(); ?>
                    </div>
                    <div class="sidebar">
                        <div class="project_inner_sidebar">
                            <div class="project_inner_title">
                                <?php if (get_field('project')) { ?><label>Project:</label> <span><?php echo get_field('project'); ?></span><?php } ?>
                            </div>
                            <div class="project_inner_client">
                                <?php if (get_field('client')) { ?><label>Client:</label> <span><?php echo get_field('client'); ?></span><?php } ?>
                            </div>
                            <div class="project_inner_year">
                                <?php if (get_field('year')) { ?><label>Year:</label> <span><?php echo get_field('year'); ?></span><?php } ?>
                            </div>
                            <div class="social_share_btns">
                                <span class="ui-icon-line-share"><i class="fa fa-share-alt" aria-hidden="true"></i> <span>SHARE</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="rt-popup rt-popup-share">
                        <div class="rt-popup-content-wrapper ps-container ps-theme-default">
                            <div class="rt-popup-close ui-icon-exit"><i class="fa fa-close" aria-hidden="true"></i></div>
                            <div class="rt-popup-content">
                                <div class="businesslounge-share-content">				
                                    <?php echo do_shortcode('[addtoany]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
