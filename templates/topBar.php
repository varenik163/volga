<?php ?>

<div class="top_bar_inner">
    <div class="col-lg-2 col-md-6 col-xs-12">
        <a href="<?php echo site_url(); ?>">
            <div class="logo_img">
                <img
                    src="<?php bloginfo('template_url');?>/img/dsts.png"
                    alt="<?php bloginfo('name');?>"
                />
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-xs-12">
        <nav id="site_main_menu" class="site_main_menu navbar-collapse">
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'header',
                    'depth' => 4, 'container' => false,
                    'menu_class' => 'nav navbar-nav'
                )
            ); ?>
        </nav>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-12">
        <?php include('telephone.php'); ?>
    </div>
    <div class="col-lg-1 col-md-2 col-xs-12">
        <a href="mailto:<?php echo get_field('email', 'options'); ?>" class="icon icon-mail"></a>
        <a href="tg://resolve?domain=<?php echo get_field('telegram', 'options'); ?>" class="icon icon-plain"></a>
    </div>
    <div class="col-lg-2 col-md-3 col-xs-12">
        <a class="recall" data-toggle="modal" data-target="#modalOrder">Обратный звонок</a>
    </div>
    <div class="col-lg-1 col-md-2 col-xs-12">
        <?php get_search_form();?>
    </div>
</div>


