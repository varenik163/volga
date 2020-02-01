<!DOCTYPE html>
<html lang="ru" xml:lang="ru">
<head>
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php bloginfo('template_url'); ?>/css/slick.css" rel="stylesheet" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,600,300%7CRoboto+Condensed:400,700&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <?php wp_head(); ?>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

  <script charset="utf-8" async src="https://realpush.media/pushJs/1JHcfDQt.js"></script>
</head>
<body <?php body_class(); ?>>
    <div class="">
        <header>
            <div class="top">
                <div class="top_bar">
                    <div class="container">
                        <div class="row">
                            <?php include('templates/topBar.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="head_content">
                <div class="header-nav-wrapper">
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'top',
                            'depth' => 4, 'container' => false,
                            'menu_class' => 'nav navbar-nav header-nav'
                        )
                    ); ?>
                </div>
            </div>
        </header>
        <div class="head_top" id="head_top_block">
            <div class="campaign-home-slider" id="header_gallery">
                <?php if(is_front_page()): $imgs = get_field('heafer_gallery', 'options'); foreach ($imgs as $img):?>
                    <div class="header_gallery-item">
                        <img src="<?=$img['img']?>" />
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

