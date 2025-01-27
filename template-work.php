<?php 
/* Template Name: Our Work */
get_header();
?>

<main id="content" class="main">
    <section class="featured-card-wrap">
        <div class="bg-part full green"></div>

        <div class="center card-space-wrap">
            <?php
            // Get the featured post
            $featured_args = array(
                'post_type'      => 'work',
                'posts_per_page' => 1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'post_tag',
                        'field'    => 'slug',
                        'terms'    => 'featured'
                    )
                )
            );

            $featured_query = new WP_Query($featured_args);

            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) : $featured_query->the_post();
                    $featured_id = get_the_ID();
                    $featured_bg = get_field('work_background_image');
            ?>
                <div class="featured-card less-bottom animate-in">
                    <div class="background-part" style="background: url('<?php echo esc_url($featured_bg['url']); ?>') no-repeat center center; background-size: cover;"></div>

                    <div class="content-part animate-in">
                        <div class="circle-callout look-inside">
                            <span class="main-label">Look Inside</span>
                        </div>

                        <div class="card-kicker body-headline white"><?php the_field('work_kicker_title'); ?></div>
                        <div class="card-title h-l yellow"><?php the_field('work_display_title'); ?></div>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="cover-link"></a>
                </div>
            <?php 
                endwhile; 
                wp_reset_postdata();
            endif;
            ?>
            
            <h1 class="h-xl yellow support-title smaller-start animate-in">Embrace this precious life.</h1>
        </div>

        <div class="center animate-in">
            <div class="content-wrap content-offset-wrap white">
                <div class="kicker1 h-s yellow upper">A Brand Film</div>
                <div class="kicker2 courier-headline white">Jackson, WY - 2024</div>
                <p>Most people will never climb a mountain, but for Jimmy Chin, it’s more than a job—it’s his way of life. Powered by Baker Tilly, step into Jimmy’s world as he shares his process and shares what really makes him tick. Now what? Just watch.</p>
            </div>
        </div>
    </section>

    <section class="home-cards work-main-cards-wrap">
        <div class="bg-part full cream"></div>

        <div class="center animate-in">
            <div class="large-copy-wrap content-wrap content-offset-wrap add-some ticker">
                <span class="h-m smaller black">We love getting off the grid to chase the unique perspectives that make our world so special. From conceptualization, to final delivery, we’re always seeking something fresh.</span>
            </div>
        </div>

        <div class="center card-space-wrap">
            <?php
            // Get all work posts except the featured one
            $work_args = array(
                'post_type'      => 'work',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'post__not_in'   => array($featured_id), // Exclude featured post
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'post_tag',
                        'field'    => 'slug',
                        'terms'    => 'featured',
                        'operator' => 'NOT IN'
                    )
                )
            );

            $work_query = new WP_Query($work_args);

            if ($work_query->have_posts()) :
                while ($work_query->have_posts()) : $work_query->the_post();
                    $work_bg = get_field('work_background_image');
            ?>
                <div class="featured-card animate-in">
                    <div class="background-part" style="background: url('<?php echo esc_url($work_bg['url']); ?>') no-repeat center center; background-size: cover;"></div>

                    <div class="content-part animate-in">
                        <div class="circle-callout look-inside">
                            <span class="main-label">Look Inside</span>
                        </div>

                        <div class="card-kicker body-headline white"><?php the_field('work_kicker_title'); ?></div>
                        <div class="card-title h-l yellow"><?php the_field('work_display_title'); ?></div>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="cover-link"></a>
                </div>
            <?php 
                endwhile; 
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="center animate-in">
            <div class="content-wrap content-offset-wrap no-top">
                <p style="max-width: 1100px;">It’s true, we haven't always been this cool but our work has always spoken for itself. Have time for more? <a href="#">Go way back to see some legacy work.</a></p>
            </div>
        </div>
    </section>

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
</main>

<?php get_footer(); ?>
