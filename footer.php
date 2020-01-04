<script type="text/javascript">
    $(document).ready(function () {
        $('#btnShow').click(function () {

            $("#dialog").dialog();

        });
    });
</script>

<div class="homepage_contact_section">
    <div class="container">
        <h2>Take your first step towards business success</h2>
        <?php echo do_shortcode('[contact-form-7 id="93" title="Contact form 1"]'); ?>
    </div>
</div>


<footer class="site-footer">
    <div class="container">
        <div class="site_footer_top">
            <div class="site_footer_top_left">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </div>
            <div class="site_footer_top_middle">
                <?php wp_nav_menu(array('menu' => 'Footer Company Menu')); ?>
            </div>
            <div class="site_footer_top_right">
                <?php wp_nav_menu(array('menu' => 'Our Services Menu')); ?>
            </div>
        </div><!-- .site-info -->
        <div class="site_footer_bottom">
            <span><?php dynamic_sidebar('sidebar-2'); ?></span>
        </div>
    </div>
</footer><!-- .site-footer -->



<?php wp_footer(); ?>

<!--Get Free Copy HomePage Modal -->
<div id="myModal" class="modal home_popup fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Get you FREE copy</h4>
            </div>
            <div class="modal-body">
                <div class="popup_form">
                    <?php echo do_shortcode('[contact-form-7 id="153" title="Get You Free Copy"]'); ?>
                </div>
            </div>      
        </div>
    </div>
</div>

<!--Free Consultation Header Modal -->
<div id="myFCModal" class="modal home_popup fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Free Consultation</h4>
            </div>
            <div class="modal-body">
                <div class="popup_form">
                    <?php echo do_shortcode('[contact-form-7 id="165" title="Free Consultation"]'); ?>
                </div>
            </div>      
        </div>
    </div>
</div>

<div id="myMCModal" class="modal home_popup fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Get a Quote</h4>
            </div>
            <div class="modal-body">
                <div class="popup_form">
                    <?php echo do_shortcode('[contact-form-7 id="360" title="Get Quote"]'); ?>
                </div>
            </div>      
        </div>
    </div>
</div>

</body>
</html>
