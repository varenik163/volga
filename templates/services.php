<?php
$terms = get_terms(array(
    'taxonomy'     => 'service_type',
    'type'         => 'service',
    'child_of'     => 0,
    'parent'       => '',
    'orderby'      => 'term_id',
    'order'        => 'ASC',
    'hide_empty'   => 0,
    'hierarchical' => 1,
    'exclude'      => '',
    'include'      => '',
    'number'       => 0,
    'pad_counts'   => false,
));
// var_dump($terms);
foreach ($terms as $cat): ?>
    <div class="col-lg-3">
        <a href="<?=get_term_link((int)$cat->term_id); ?>">
        <div class="home-complex-support-item">
            <div class="img-circle-wrapper">
                <img src="<?php echo get_field('service_type_image', $cat);?>" />
            </div>
                <strong class="cat-name"><?php echo $cat->name; ?></strong>
            <!--<p class="cat-desc"><?php /*echo $cat->description; */?></p>-->
        </div>
        </a>
    </div>
<?php endforeach;
?>
