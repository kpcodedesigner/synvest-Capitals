<?php
/*
  Template Name: Project template
 */
get_header();
?> 

<div class="container">
    <div data-js="filtering-demo">
        <div id="filters"  class="filter-button-group button-group js-radio-button-group">
            <span>Services</span>
            <button class="button is-checked" data-filter="*">all</button>

            <?php
            $categories = get_categories(array(
                'orderby' => 'name',
                'order' => 'ASC'
            ));

            foreach ($categories as $category) {
                if ($category->name != 'Uncategorized') {

                    $category_link = sprintf(
                            '<button class="button" data-filter=".%1$s">%2$s</button>', esc_html($category->slug), esc_html($category->name)
                    );
                    echo $category_link;
                }
            }
            ?>

        </div>

        <div class="service_main_section grid">
            <div class="isotope ">
                <?php
                global $query;
                $args = array(
                    'post_type' => 'project'
                );
                $query = new WP_Query($args);
                if ($query->have_posts()):
                    ?>

                    <?php
                    while ($query->have_posts()):
                        $query->the_post();
                        ?>
                        <?php
                        $category_detail = get_the_category(); //$post->ID
                        foreach ($category_detail as $cd) {
                            $cat_name = $cd->slug;
                        }
                        ?>
                        <div  class="element-item transition <?php echo $cat_name; ?>" data-category="<?php echo $cat_name; ?>" >
                            <a href="<?php echo get_the_permalink(); ?>"> <div class="filter_boxes">
                                    <div class="filter_images">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('project-image');
                                        }
                                        ?>
                                    </div>
                                    <div class="filter_main_content">
                                        <div class="filter_title"><?php echo get_the_title(); ?></div>
                                        <?php $categories = get_the_category(); ?>
                                        <div class="filter_tag"><?php echo esc_html($categories[0]->name); ?></div>
                                        <div class="filter_content"><p><?php echo get_the_excerpt(); ?></p></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile;
                    ?>

                    <?php
                endif;
                ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>