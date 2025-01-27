<?php
get_header();
?>

<main id="content" class="main">
    <?php
    // Fetch ACF fields at the top for cleaner code.
    $card_image = get_field('card_image');
    $card_kicker = get_field('card_kicker');
    $card_title = get_field('card_title');
    $main_title = get_field('main_title');
    $kicker1 = get_field('intro_support_kicker_1');
    $kicker2 = get_field('intro_support_kicker_2');
    $intro_support_content = get_field('intro_support_content');
    $support_points = get_field('support_points');
    $video_url = get_field('intro_video_url');
    $intro_image = get_field('intro_or_image');
    ?>

    <section class="featured-card-wrap">
        <div class="bg-part full green"></div>

        <div class="center card-space-wrap">
            <div class="featured-card less-bottom animate-in">
                <?php if (!empty($card_image)) : ?>
                    <div class="background-part" style="background: url(<?php echo esc_url($card_image['url']); ?>) no-repeat center center; background-size: cover;"></div>
                <?php endif; ?>

                <div class="content-part animate-in">
                    <?php if (!empty($card_kicker)) : ?>
                        <div class="card-kicker body-headline white"><?php echo esc_html($card_kicker); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($card_title)) : ?>
                        <div class="card-title h-l yellow"><?php echo $card_title; ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($main_title)) : ?>
                <h1 class="h-xl yellow support-title smaller-start animate-in"><?php echo $main_title; ?></h1>
            <?php endif; ?>
        </div>

        <div class="center animate-in">
            <div class="content-wrap content-offset-wrap white">
                <?php if (!empty($kicker1)) : ?>
                    <div class="kicker1 h-s yellow upper"><?php echo esc_html($kicker1); ?></div>
                <?php endif; ?>

                <?php if (!empty($kicker2)) : ?>
                    <div class="kicker2 courier-headline white"><?php echo esc_html($kicker2); ?></div>
                <?php endif; ?>

                <?php if (!empty($intro_support_content)) : ?>
                    <p><?php echo wp_kses_post($intro_support_content); ?></p>
                <?php endif; ?>

                <?php if (!empty($support_points)) : ?>
                    <div class="kicker3 courier-headline white kicker-points">
                        <?php foreach ($support_points as $point) : 
                            if (!empty($point['support_point'])) : ?>
                                <?php echo esc_html($point['support_point']); ?> <span>|</span>
                            <?php endif; 
                        endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="single-work-main">
        <div class="bg-part full cream"></div>
        <div class="bg-part top height-265 green"></div>

        <div class="center">
            <?php if (!empty($video_url)) : ?>
                <div class="iframe-wrap animate-in">
                    <iframe title="vimeo-player" src="<?php echo esc_url($video_url); ?>" width="640" height="360" frameborder="0" allowfullscreen></iframe>
                </div>
            <?php elseif (!empty($intro_image)) : ?>
                <img src="<?php echo esc_url($intro_image['url']); ?>" alt="<?php echo esc_attr($intro_image['alt']); ?>" />
            <?php endif; ?>

            <?php if( have_rows('main_content_builder') ): ?>
                <?php while( have_rows('main_content_builder') ): the_row(); ?>

                    <?php if( get_row_layout() == 'medium_quote' ): ?>
                        <div class="large-copy-wrap content-wrap content-offset-wrap ticker work-spacing animate-in">
                            <span class="h-m smaller black"><?php the_sub_field('quote_content'); ?></span>
                        </div>

                    <?php elseif( get_row_layout() == 'standard_content' ): ?>
                        <div class="content-wrap content-offset-wrap formatted-content-wrap animate-in">
                            <div class="inner">
                                <?php the_sub_field('standard_content'); ?>
                            </div>
                        </div>

                    <?php elseif( get_row_layout() == 'image_block' ): ?>
                        <?php $image = get_sub_field('image'); ?>
                        <?php if( $image ): ?>
                            <div class="inline-image-wrap animate-in">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            </div>
                        <?php endif; ?>

                    <?php elseif( get_row_layout() == 'video_block' ): ?>
                        <div class="inline-video-wrap iframe-wrap animate-in">
                            <iframe title="vimeo-player" src="<?php the_sub_field('video_embed_url'); ?>" width="640" height="360" frameborder="0" allowfullscreen></iframe>
                        </div>

                    <?php elseif( get_row_layout() == 'spacer' ): ?>
                        <div class="spacer-wrap s-90"></div>

                    <?php elseif( get_row_layout() == 'gallery_block' ): ?>
                        <?php $gallery_images = get_sub_field('image_gallery'); ?>
                        <?php if( $gallery_images ): ?>
                            <div class="gallery-wrap animate-in">
                                <?php foreach( $gallery_images as $image ): ?>
                                    <div class="item" style="background: url(<?php echo esc_url($image['url']); ?>) no-repeat center center; background-size: cover;"></div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </section>

    <?php if (get_field('add_more_to_series')) : ?>
        <section class="find-more more-this-work">
            <div class="bg-part full cream"></div>

            <div class="intro-part">
                <div class="center animate-in">
                    <div class="content-offset-wrap">
                        <?php if (get_field('more_text')) : ?>
                            <div class="h-m2 black">
                                <?php the_field('more_text'); ?>
                                <div class="go-next-icon-wrap">
                                    <img src="<?php bloginfo('template_directory'); ?>/library/images/icon-theresmore.svg">
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (get_field('more_support_text')) : ?>
                            <p class="courier-headline black">
                                <?php 
                                    $more_support_text = get_field('more_support_text');
                                    echo str_replace('[]', 'Origin Stories', esc_html($more_support_text));
                                ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="videos">
                <div class="center">
                    <?php if (have_rows('more_items')) : ?>
                        <?php while (have_rows('more_items')) : the_row(); ?>
                            <div class="entry animate-in">
                                <?php if (get_sub_field('video_url')) : ?>
                                    <div class="iframe-wrap">
                                        <iframe 
                                            title="vimeo-player" 
                                            src="<?php echo get_sub_field('video_url'); ?>" 
                                            width="640" 
                                            height="360" 
                                            frameborder="0" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                <?php endif; ?>

                                <div class="content-wrap content-offset-wrap">
                                    <?php if (get_sub_field('title')) : ?>
                                        <div class="l1 h-m green"><?php the_sub_field('title'); ?></div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('support_line')) : ?>
                                        <div class="l2 courier-headline"><?php the_sub_field('support_line'); ?></div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('content')) : ?>
                                        <div class="l3"><?php the_sub_field('content'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="end-cta">
        <div class="bg-part full green"></div>

        <a href="/our-work/" class="circle-callout more-work animate-in">
            <span class="main-label">More Work</span>
        </a>

        <div class="center animate-in">
            <p class="white"><?php the_field('cta_text'); ?></p>
            <div class="h-xl yellow"><?php the_field('cta_secondary_text'); ?></div>
            <a href="<?php the_field('cta_button_link'); ?>" class="cta-btn">
                <span><?php the_field('cta_button_text'); ?></span>
            </a>
        </div>
    </section>

    <section class="find-more">
        <div class="intro-part">
            <div class="bg-part full yellow"></div>

            <div class="center animate-in">
                <div class="h-m2 black">
                    There’s more where that came from.
                    <div class="go-next-icon-wrap special">
                        <img src="<?php bloginfo('template_directory'); ?>/library/images/icon-theresmore.svg" alt="Explore more">
                    </div>
                </div>
                <p class="courier-headline black">Explore other projects that we’re excited about.</p>
            </div>
        </div>

        <div class="card-part">
            <div class="bg-part full cream"></div>

            <div class="center">
                <?php
                $current_id = get_the_ID();

                // Query the next post
                $args = array(
                    'post_type'      => 'work',
                    'posts_per_page' => 1,
                    'order'          => 'ASC',
                    'orderby'        => 'date',
                    'post__not_in'   => array($current_id),
                    'date_query'     => array(
                        array(
                            'after' => get_the_date('Y-m-d H:i:s', $current_id),
                            'inclusive' => false,
                        ),
                    ),
                );

                $next_post_query = new WP_Query($args);

                // If no next post found, get the first post
                if (!$next_post_query->have_posts()) {
                    $args['date_query'] = array(); // Reset date query to get the first post
                    $next_post_query = new WP_Query($args);
                }

                if ($next_post_query->have_posts()):
                    while ($next_post_query->have_posts()): $next_post_query->the_post();
                        $card_bg = get_field('work_background_image');
                        $card_kicker = get_field('work_kicker_title');
                        $card_title = get_field('work_display_title');
                ?>
                    <div class="featured-card animate-in">
                        <div class="background-part" style="background: url('<?php echo esc_url($card_bg['url']); ?>') no-repeat center center; background-size: cover;"></div>

                        <div class="content-part animate-in">
                            <div class="circle-callout look-inside">
                                <span class="main-label">Look Inside</span>
                            </div>

                            <div class="card-kicker body-headline white"><?php echo $card_kicker; ?></div>
                            <div class="card-title h-l yellow"><?php echo $card_title; ?></div>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="cover-link"></a>
                    </div>
                <?php 
                    endwhile; 
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>