<?php
/*
  Template Name: Services template
 */
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

<div class="service_main_section">

    <?php
    global $query;
    $count = 1;
    $count1 = 1;
    $args = array(
        'post_type' => 'acme_product_1'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
            ?>
            <div class="service_main_boxes"> 
                <div class="container">                    
                    <div class="service_main_boxes_img col-md-5">
                        <div class="service_img">
                            <?php
                            $image = get_field('image_for_services_page');
                            ?>
                            <img src="<?php echo $image ?>">
                        </div>
                    </div>
                    <div class="service_main_boxes_content col-md-7">
                        <div class="service_text">
                            <h5><?php echo get_the_title(); ?></h5>
                            <p><?php echo get_the_content(); ?></p>
                            <div class="services_small_box">
                                <div class="services_small_box_left">
                                    <ul>
                                        <?php
                                        $target = get_field('target_readers');
                                        if ($target) {
                                            ?><li>Target Readers: <?php echo $target; ?></li><?php } ?>
                                        <?php
                                        $size = get_field('size');
                                        if ($size) {
                                            ?><li>Size: <?php echo $size; ?></li><?php } ?>
                                            <?php
                                            $timeline = get_field('timeline');
                                            if ($timeline) {
                                                ?><li>Timeline: <?php echo $timeline; ?></li><?php } ?>
                                            <?php
                                            $revisions = get_field('revisions');
                                            if ($revisions) {
                                                ?><li>Revisions: <?php echo $revisions; ?></li><?php } ?>
                                    </ul>
                                </div>
                                <div class="services_small_box_right">
                                    <?php
                                    $sample_pdf = get_field('sample_pdf_file');
                                    if ($sample_pdf) {
                                        ?>
                                        <div class="view_sample_btn">
                                            <a href="#" data-toggle="modal" data-target="#pdf<?php echo $count; ?>"> View Sample</a>
                                        </div>
                                    <?php } ?>
                                    <div class="get_quote_btn">
                                        <a href="#" data-toggle="modal" data-target="#myMCModal">Get a Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <?php if ($sample_pdf) { ?>
                    <div id="pdf<?php echo $count1; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>                      
                                </div>
                                <div class="modal-body">
                                    <embed src="<?php echo $sample_pdf; ?>"  frameborder="0" width="100%" height="500px">                  
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>   
            <?php
            $count++;
            $count1++;
        endwhile;
    endif;
    ?>

</div>
<?php get_footer(); ?>