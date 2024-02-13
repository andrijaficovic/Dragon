<?php
// Get field values
$block_layout = get_field('block_layout');
$block_title = get_field('block_title');
$block_description = get_field('block_description');
$block_cta = get_field('block_cta');
$block_image = get_field('block_image');
$choose_background = get_field('choose_background');
$background_color = ($choose_background === 'one') ? get_field('background_color') : get_field('linear_gradient_background');
$block_class = ($block_layout === 'text_right') ? 'fcb-inverse' : '';
$read_more = get_field('read_more');
// Extract title and color if available
$title_text = isset($block_title['title']) ? $block_title['title'] : '';
$title_color = isset($block_title['color']) ? $block_title['color'] : '';

// Extract background colors if available
$bg_color1 = isset($background_color['top_left_color']) ? $background_color['top_left_color'] : '';
$bg_color2 = isset($background_color['bottom_right_color']) ? $background_color['bottom_right_color'] : '';

// Extract CTA link data if available
$cta_link = isset($block_cta['link']) ? $block_cta['link'] : '';
$bg_style = ($choose_background === 'one')
    ? 'background-color:' . esc_attr($background_color)
    : "background-image: linear-gradient(to bottom right, $bg_color1, $bg_color2);";

// Output the HTML
?>
<section class="featured-content-block <?php echo esc_attr($block_class); ?>" style="<?php echo $bg_style ?>">
    <div class="block-wrapper">
        <div class="block-content">
            <?php if (!empty($title_text)) : ?>
                <h2 class="block-title" style="color: <?php echo esc_attr($title_color); ?>"><?php echo esc_html($title_text); ?></h2>
            <?php endif; ?>
            <?php if (!empty($block_description)) : ?>
                <div class="block-description">
                    <p class="description-summary" style="color: <?php echo esc_attr($block_description['color']); ?>">
                        <?php echo esc_html($block_description['summary']); ?>
                        <?php if (!empty($read_more)) : ?>
                            <button class="read-more-btn" style="color: <?php echo esc_attr($read_more['color']); ?>"><?php echo esc_html($read_more['text']); ?></button>
                        <?php endif; ?>
                    </p>
                    <p class="description-body" style="color: <?php echo esc_attr($block_description['color']); ?>"><?php echo esc_html($block_description['body']); ?></p>
                </div>
            <?php endif; ?>
            <?php if (!empty($cta_link['url'])) : ?>
                <a class="block-cta" href="<?php echo esc_url($cta_link['url']); ?>" target="<?php echo esc_attr($cta_link['target']); ?>" style="color: <?php echo esc_attr($block_cta['text_color']); ?>; background-color: <?php echo esc_attr($block_cta['button_background_color']); ?>"><?php echo esc_html($cta_link['title']); ?></a>
            <?php endif; ?>
        </div>
        <div class="block-image">
            <?php if (!empty($block_image['url'])) : ?>
                <img src="<?php echo esc_url($block_image['url']); ?>" alt="<?php echo esc_attr($block_image['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
</section>