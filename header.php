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
            <?php if(is_front_page()): ?>
                <div class="head_top" id="head_top_block">
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
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="site-name">
                                        <span class="site-name-start">
                                            <?php echo substr(get_bloginfo('name'), 0, 4);?>
                                        </span>
                                        <span class="site-name-end">
                                            <?php echo substr(
                                                    get_bloginfo('name'),
                                                    4,
                                                    strlen(get_bloginfo('name'))
                                            );?>
                                        </span>
                                    </div>
                                    <div class="site-desc"><?php bloginfo('description');?></div>
                                    <div class="head-comments-link">
                                        <a href="<?php echo site_url().'/o-nas/#about-reviews-anchor'; ?>">
                                            <span class="icon icon-comments"></span>
                                            <span>Отзывы о компании</span>
                                        </a>
                                    </div>
                                    <div class="row about-items">
                                        <?php
                                        $fields = get_field('header_about_items');
                                        foreach ($fields as $field): ?>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="about-items-item">
                                                    <img src="<?php echo $field['header_about_items_item']['header_about_items_item_icon']?>" />
                                                    <div><?php echo $field['header_about_items_item']['header_about_items_item_text']?></div>
                                                </div>
                                            </div>
                                        <?php endforeach;
                                        ?>
                                    </div>
                                    <div class="row recall-order-wrapper">
                                        <div class="col-lg-12">
                                            <a class="recall-order" data-toggle="modal" data-target="#modalOrder">Заказать обратный звонок</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
            <div class="top">
                <div class="top_bar_page">
                    <div class="container ">
                        <div class="row">
                            <?php include('templates/topBar.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            </header>

