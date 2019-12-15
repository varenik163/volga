<?php

/*
 * Template Name: Contacts
 */

get_header();

?>
<div id="other" class="content">
    <div class="container">
        <div class="row post_content">
            <div class="col-lg-12">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="">
                        <div class="post_title">
                            <h1>
                                <?php the_title(); ?>
                            </h1>
                        </div>
                        <div class="post_body">
                            <?php the_content(''); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php include('templates/contacts.php'); ?>
        <div class="row image-phrase">
            <div class="col-lg-12">
                <h3><?php echo get_field('image_phrase', 'options');?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 centerated">
                <a class="recall-order recall-order-blue" data-toggle="modal" data-target="#modalOrder">Заказать обратный звонок</a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
