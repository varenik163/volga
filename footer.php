    <footer>
        <div class="ft_divider"></div>
        <div id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-xs-12">
                        <a href="<?php echo site_url(); ?>">
                            <div class="ft_logo">
                                <img
                                    src="<?php bloginfo('template_url');?>/img/dsts.png"
                                    alt="<?php bloginfo('name');?>"
                                />
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-xs-12 company-info">
                        <?=get_field('ft_text', 'options'); ?>
                    </div>
                    <div class="col-lg-2 col-md-6 col-xs-12 head-comments-link">
                        <a data-toggle="modal" data-target="#modalReview">
                            <span class="icon icon-comments"></span>
                            <span class="comment-link-text">Оставить отзыв</span>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <nav id="site_main_menu" class="site_main_menu">
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'bottom',
                                    'depth' => 4, 'container' => false,
                                    'menu_class' => 'nav navbar-nav'
                                )
                            ); ?>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-6 col-xs-12">
                        <?php include('templates/telephone.php'); ?>
                        <a href="mailto:<?php echo get_field('email', 'options'); ?>" class="icon icon-mail"></a>
                        <a href="tg://resolve?domain=<?php echo get_field('telegram', 'options'); ?>" class="icon icon-plain"></a>
                        <a class="recall" data-toggle="modal" data-target="#modalOrder">Обратный звонок</a>
                    </div>
                    <!--<small>
                        Icons made by
                        <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">
                            Smashicons
                        </a>
                        from
                        <a href="https://www.flaticon.com/" title="Flaticon">
                            www.flaticon.com
                        </a>
                        is licensed by
                        <a href="http://creativecommons.org/licenses/by/3.0/"  title="Creative Commons BY 3.0" target="_blank">
                            CC 3.0 BY
                        </a>
                    </small>-->
                </div>
            </div>
        </div>
        <?php include('templates/modalOrder.php') ?>
        <?php include('templates/modalReview.php') ?>
        <?php include('templates/modalResume.php') ?>
    </footer>
    <?php dynamic_sidebar('footer1');?>
    <?php wp_footer(); ?>
    <script src="<?php bloginfo('template_url'); ?>/js/slick.js"></script>
    </body>
</html>

<?php

 /*$file = file_get_contents('templates/menu.htm.txt', true);
 $noACP = str_replace('<P ALIGN="CENTER"> </P>', '', $file);
 $noAC = str_replace('ALIGN="CENTER"', '', $noACP);
 $res = str_replace('<BR WP="BR1"><BR WP="BR2">', '', $noAC);

 var_dump($res)*/

?>
