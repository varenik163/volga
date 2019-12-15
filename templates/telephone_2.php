<?php ?>
<div class="tel">
    <a href="tel:<?php echo get_field('tel_sec_code', 'options'); echo ' '; echo get_field('tel_sec_number', 'options');?>">
        <span class="tel-code"><?php echo get_field('tel_sec_code', 'options'); ?> </span>
        <span class="tel-number"><?php echo get_field('tel_sec_number', 'options'); ?></span>
    </a>
</div>
