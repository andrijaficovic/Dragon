<?php
$block_layout = get_field('block_layout');
$block_class = '';
if ($block_layout === 'text_right') {
    $block_class = 'fcb-inverse';
}
$block_title = get_field('block_title');
$block_description = get_field('block_description');
$block_cta = get_field('block_cta');
$block_image = get_field('block_image');
$choose_background = get_field('choose_background');
$background_color = '#FFFFFF';
if ($choose_background === 'one') {
    $background_color = get_field('background_color');
} else if ($choose_background === 'two') {
    $background_color = get_field('linear_gradient_background');
    $bg_color1 = $background_color['top_left_color'];
    $bg_color2 = $background_color['bottom_right_color'];
}
$read_more = get_field('read_more');
?>
<section class="featured-content-block <?php echo $block_class ?>" style="background-color: <?php echo $background_color ?>;">
    <div class="block-wrapper">
        <div class="block-content">
            <?php if ($block_title) : ?>
                <h2 class="block-title"><?php echo $block_title ?></h2>
            <?php endif; ?>
            <?php if ($block_description) : ?>
                <div class="block-description">
                    <p class="description-summary"><?php echo $block_description['summary'] ?>
                        <?php if ($read_more) : ?>
                            <button class="read-more-btn"><?php echo $read_more ?></button>
                        <?php endif; ?>
                    </p>
                    <p class="description-body"><?php echo $block_description['body'] ?></p>
                </div>
            <?php endif; ?>
            <?php if ($block_cta) : ?>
                <?php
                $link_url = $block_cta['url'];
                $link_title = $block_cta['title'];
                $link_target = $block_cta['target'] ? $block_cta['target'] : '_self';
                ?>
                <a class="block-cta" href="<?php echo $link_url ?>" target="<?php echo $link_target ?>"><?php echo $link_title ?></a>
            <?php endif; ?>
        </div>
        <div class="block-image">
            <?php if (!empty($block_image)) : ?>
                <img src="<?php echo esc_url($block_image['url']); ?>" alt="<?php echo esc_attr($block_image['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
</section>