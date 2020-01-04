<?php
get_header();
?>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <div class="page_title">
            <div class="container">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
        </div>
        <?php the_content(); ?>       
        <?php
    endwhile;
endif;
?> 

<?php
get_footer();
