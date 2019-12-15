<?php
    /*header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".get_bloginfo('url'));
exit();*/
?>
<?php get_header(); ?>
    <div id="content" class="content">
        <div class="container">
            <div class="wrapper">
                <div class="content_left">
                    <div class="post">
                        <div class="breadcrumbs"><?php if(function_exists('bcn_display')) : bcn_display(); endif;?></div>
                        <div class="post_title">
                            <h1>Ошибка 404 - не найдено</h1>
                        </div>
                        <div class="post_body">
                            <br />
                            Попробуйте сходить на <a href="<?php bloginfo('home'); ?>">главную страницу</a>.
                        </div>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
