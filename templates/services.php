<?php
$terms = get_terms(array(
    'taxonomy'     => 'service',
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
//var_dump($terms);
foreach ($terms as $cat): ?>
    <div class="col-lg-5ths">
        <div class="home-complex-support-item">
            <div class="img-circle-wrapper">
                <img src="<?php echo get_field('cat_img', $cat);?>" />
            </div>
            <strong class="cat-name"><?php echo $cat->name; ?></strong>
            <p class="cat-desc"><?php echo $cat->description; ?></p>
            <div>
                <?php if(
                    $cat->slug === 'legal_adress'
                    || $cat->slug=== 'bookers'
                    || $cat->slug=== 'companies'
                    || $cat->slug=== 'legal_services'
                    || $cat->slug=== 'hr_records'
                ) : ?>
                <span class="arrow-in-circle">
                    <?php $services = get_posts( array(
                        'numberposts' => 0,
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'service',
                                'field' => 'id',
                                'terms' => $cat->term_id, // Where term_id of Term 1 is "1".
                                'include_children' => false
                            )
                        ),
                        'post_type'   => 'service',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    if(count($services) !== 0) : ?>
                        <div class="services-fade-list">
                        <ul>
                            <?php foreach ($services as $service): ?>
                                <li>
                                <a href="<?=get_permalink($service->ID); ?>"><?=$service->post_title?></a>
                            </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach;
?>
