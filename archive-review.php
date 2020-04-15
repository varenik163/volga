<?php get_header(); ?>
<section class="content" id="other">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if (!is_home() || !is_front_page()) : ?>
                    <div class="breadcrumbs"><?php if(function_exists('bcn_display')) : bcn_display(); endif;?></div>
                <?php endif;?>
                <div class="post_title">
                    <h1>Отзывы</h1>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <?php /*echo do_shortcode('[modula id="314"]'); */?>
                    <?php echo do_shortcode('[metaslider id="423"]'); ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
