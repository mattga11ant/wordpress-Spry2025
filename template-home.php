<?php 
/* Template Name: Home */
get_header();
?>

<main id="content" class="main">
    <section class="page-intro-large home">
        <div class="bg-part full green"></div>

        <div class="center">
            <div class="home-card-wrap animate-in">
                <div class="image-part">
                    <div class="inner1">
                        <div class="inner2">
                            <?php 
                            $bg_image = get_field('intro_background_image');
                            $bg_video = get_field('intro_background_video');
                            if ($bg_image) : ?>
                                <img class="bg-placeholder" src="<?php echo esc_url($bg_image['url']); ?>" alt="<?php echo esc_attr($bg_image['alt']); ?>">
                            <?php endif; ?>
                            <?php if ($bg_video) : ?>
                                <video class="bg-video" autoplay muted loop playsinline>
                                    <source src="<?php echo esc_url($bg_video['url']); ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if (get_field('intro_title')) : ?>
                    <div class="content-line">
                        <h1 class="card-title yellow"><?php the_field('intro_title'); ?></h1>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (get_field('intro_content')) : ?>
                <div class="content-wrap content-offset-wrap white animate-in delay1">
                    <div class="inner">
                        <?php the_field('intro_content'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="home-cards">
        <div class="bg-part full cream"></div>
        <div class="bg-part top height-337 green"></div>

        <div class="center card-space-wrap">
            <?php 
            $featured_cards = get_field('featured_cards');
            if ($featured_cards) :
                foreach ($featured_cards as $card) : 
                    $card_bg = get_field('work_background_image', $card->ID);
            ?>
                <div class="featured-card animate-in">
                    <div class="background-part" style="background: url('<?php echo esc_url($card_bg['url']); ?>') no-repeat center center; background-size: cover;"></div>
                    <div class="content-part animate-in">
                        <div class="circle-callout look-inside">
                            <span class="main-label">Look Inside</span>
                        </div>
                        <div class="card-kicker body-headline white"><?php the_field('work_kicker_title', $card->ID); ?></div>
                        <div class="card-title h-l yellow"><?php the_field('work_display_title', $card->ID); ?></div>
                    </div>
                    <a href="<?php echo get_permalink($card->ID); ?>" class="cover-link"></a>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>

        <?php if (get_field('card_content')) : ?>
            <div class="center">
                <div class="content-wrap content-offset-wrap animate-in">
                    <span class="h-m smaller black"><?php the_field('card_content'); ?></span>
                </div>
            </div>
        <?php endif; ?>
    </section>

    <section class="home-focus">
        <div class="bg-part full cream"></div>

        <div class="center">

            <div class="title-part content-offset-wrap animate-in">
                <?php if (get_field('focus_title')) : ?>
                    <h2 class="h-l black"><?php the_field('focus_title'); ?></h2>
                <?php endif; ?>
                <?php if (have_rows('focus_areas')) : ?>
                    <div class="areas">
                        <?php while (have_rows('focus_areas')) : the_row(); ?>
                            <span><?php the_sub_field('area'); ?></span>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (get_field('focus_content')) : ?>
                <div class="float-content content-offset-wrap animate-in">
                    <p><?php the_field('focus_content'); ?></p>
                </div>
            <?php endif; ?>

            <div class="floating-image-wrap-outer">
                <div class="floating-image-wrap">
                    <?php if (get_field('focus_quote')) : ?>
                        <div class="large-quote green animate-in"><?php the_field('focus_quote'); ?></div>
                    <?php endif; ?>
                    <?php 
                    $focus_images = get_field('focus_images');
                    if ($focus_images) : 
                        foreach ($focus_images as $index => $image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="floating-image img<?php echo $index + 1; ?> animate-in">
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>

    <section class="home-cards home-cards-2">
        <div class="bg-part full cream"></div>

        <?php if (get_field('card_content_2')) : ?>
            <div class="center">
                <div class="large-copy-wrap content-wrap content-offset-wrap add-some animate-in">
                    <?php the_field('card_content_2'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="center card-space-wrap">
            <?php 
            $featured_cards = get_field('featured_cards_2');
            if ($featured_cards) :
                foreach ($featured_cards as $card) : 
                    $card_bg = get_field('work_background_image', $card->ID);
            ?>
                <div class="featured-card animate-in">
                    <div class="background-part" style="background: url('<?php echo esc_url($card_bg['url']); ?>') no-repeat center center; background-size: cover;"></div>
                    <div class="content-part animate-in">
                        <div class="circle-callout look-inside">
                            <span class="main-label">Look Inside</span>
                        </div>
                        <div class="card-kicker body-headline white"><?php the_field('work_kicker_title', $card->ID); ?></div>
                        <div class="card-title h-l yellow"><?php the_field('work_display_title', $card->ID); ?></div>
                    </div>
                    <a href="<?php echo get_permalink($card->ID); ?>" class="cover-link"></a>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
    </section>

    <section class="end-cta">
        <div class="bg-part full green"></div>

        <a href="/our-work/" class="circle-callout more-work animate-in">
            <span class="main-label">More Work</span>
        </a>

        <div class="center animate-in">
            <?php if (get_field('cta_text')) : ?>
                <p class="white"><?php the_field('cta_text'); ?></p>
            <?php endif; ?>
            <?php if (get_field('cta_text_secondary')) : ?>
                <div class="h-xl yellow"><?php the_field('cta_text_secondary'); ?></div>
            <?php endif; ?>
            <?php if (get_field('cta_button_text') && get_field('cta_button_link')) : ?>
                <a href="<?php the_field('cta_button_link'); ?>" class="cta-btn">
                    <span><?php the_field('cta_button_text'); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>