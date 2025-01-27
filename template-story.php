<?php 
/* Template Name: Our Story */
get_header();
?>

<main id="content" class="main">
    <section class="page-intro-story">
        <div class="bg-part full black"></div>
        <div class="bg-part story cream"></div>

        <div class="center animate-in">
           <h1 class="yellow"><?php the_field('intro_heading'); ?></h1>
           <div class="image-part">
               <div class="inner" style="background: url(<?php echo esc_url(get_field('intro_background')['url']); ?>) no-repeat center center; background-size: cover;">
                   <span class="caption courier-body white"><?php the_field('intro_caption'); ?></span>
               </div>
           </div>
        </div>
    </section>

    <section class="roots">
        <div class="bg-part full cream"></div>

        <div class="center">
            <div class="content-wrap content-offset-wrap">
                <div class="intro-part animate-in">
                    <div class="icon"><svg width="298" height="298" viewBox="0 0 298 298" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="149" cy="149" r="149" fill="#FAE819"/><path d="M230.413 179.233L227.035 172.847C225.635 170.21 192.565 108.164 163.88 107.526H163.407C156.57 107.526 149.363 110.966 142.3 116.198C139.479 115.106 136.679 114.468 133.919 114.406H133.446C104.864 114.406 69.3848 174.289 67.8816 176.823L66.5637 179.068L69.0554 179.83C70.3321 180.222 100.643 189.45 120.761 189.45C130.439 189.45 136.205 187.328 138.429 182.961C138.614 182.591 138.758 182.179 138.882 181.767C143 182.282 147.016 182.591 150.702 182.591C160.38 182.591 166.146 180.469 168.369 176.102C169.44 174.001 169.584 171.549 168.822 168.706C182.351 175.607 193.944 182.364 194.192 182.488L200.41 186.113L197.033 179.727C196.436 178.594 190.032 166.605 180.683 153.216C199.957 161.558 223.782 175.401 224.111 175.607L230.413 179.233ZM120.802 185.31C104.597 185.31 80.6485 178.862 72.8648 176.617C79.6601 165.637 110.177 118.485 133.487 118.485H133.858C135.381 118.526 136.905 118.773 138.47 119.206C117.508 136.777 98.9546 168.088 97.8839 169.922L96.566 172.167L99.0575 172.929C100.025 173.218 117.549 178.553 134.743 181.149C133.24 183.888 128.442 185.31 120.802 185.31ZM102.805 169.757C107.706 161.847 124.921 135.15 142.877 120.854C151.834 125.056 161.039 134.367 169.09 144.481C165.754 143.493 162.83 142.916 160.586 142.916C157.6 142.916 155.603 143.863 154.655 145.759C153.214 148.601 154.614 152.845 159.124 159.334C147.798 154.06 136.74 149.796 130.645 149.796C127.66 149.796 125.662 150.744 124.715 152.639C123.171 155.688 124.818 160.261 130.089 167.491C132.828 171.261 134.496 174.495 135.052 177.049C121.873 175.01 108.303 171.343 102.805 169.757ZM164.745 174.207C163.324 176.988 158.485 178.45 150.743 178.45C147.222 178.45 143.33 178.141 139.335 177.626C138.964 174.124 137.008 169.963 133.425 165.04C127.474 156.862 128.298 154.699 128.401 154.493C128.586 154.143 129.472 153.895 130.666 153.895C137.173 153.895 150.558 159.581 163.366 165.884C165.198 169.489 165.713 172.311 164.745 174.207ZM189.847 175.216C184.184 172.044 175.515 167.306 166.331 162.774C165.507 161.311 164.539 159.787 163.366 158.18C157.415 150.002 158.238 147.839 158.341 147.633C158.527 147.283 159.412 147.036 160.606 147.036C163.654 147.036 168.246 148.292 173.559 150.29C180.539 159.746 186.346 169.201 189.847 175.216ZM176.215 146.933C167.566 135.397 157.085 123.902 146.501 118.155C152.267 114.159 158.032 111.625 163.407 111.625H163.778C184.925 112.099 210.459 152.35 219.767 168.336C209.965 162.836 190.979 152.598 176.215 146.933Z" fill="#394D3B"/></svg></div>
                    <div class="large-quote green"><?php the_field('roots_quote'); ?></div>
                </div>

                <div class="large-copy-wrap add-some add-story animate-in">
                    <div class="kicker courier-headline black"><?php the_field('roots_kicker'); ?></div>
                    <span class="h-m smaller black"><?php the_field('roots_support_line'); ?></span>
                </div>

                <div class="more-content animate-in">
                    <?php the_field('roots_content'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="we-specialize">
        <div class="bg-part full yellow"></div>
        <div class="bg-part top height-437 cream"></div>

        <div class="center animate-in">
            <div class="img-wrap animate-in">
                <img src="<?php echo esc_url(get_field('specialize_image')['url']); ?>" alt="">
            </div>
            <div class="icon-wrap animate-in">
                <img src="<?php bloginfo('template_directory'); ?>/library/images/logo-cream.svg" alt="">
            </div>

            <div class="h-s upper kicker black animate-in"><?php the_field('specialize_title'); ?></div>
            <div class="h-m2 black animate-in"><?php the_field('specialize_support_title'); ?></div>
            <p class="courier-headline black animate-in"><a href="<?php the_field('specialize_link'); ?>"><?php the_field('specialize_link_text'); ?></a></p>
        </div>
    </section>

    <section class="the-team">
        <div class="bg-part full cream"></div>

        <div class="center">
            <div class="inner-wrap">
                <div class="people-cards animate-in">
                    <?php if (have_rows('team_members_2')) : ?>
                        <?php while (have_rows('team_members_1')) : the_row(); ?>
                            <div class="card">
                                <div class="img-wrap">
                                    <div class="inner" style="background: url(<?php echo esc_url(get_sub_field('image')['url']); ?>) no-repeat center center; background-size: cover;"></div>
                                </div>
                                <div class="content-wrap">
                                    <span class="l1 h-m black"><?php the_sub_field('name'); ?></span>
                                    <span class="l2 courier-headline black"><?php the_sub_field('title'); ?></span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="story-support-content animate-in">
                    <?php the_field('team_content'); ?>
                </div>

                <div class="people-cards animate-in">
                    <?php if (have_rows('team_members_2')) : ?>
                        <?php while (have_rows('team_members_2')) : the_row(); ?>
                            <div class="card">
                                <div class="img-wrap">
                                    <div class="inner" style="background: url(<?php echo esc_url(get_sub_field('image')['url']); ?>) no-repeat center center; background-size: cover;"></div>
                                </div>
                                <div class="content-wrap">
                                    <span class="l1 h-m black"><?php the_sub_field('name'); ?></span>
                                    <span class="l2 courier-headline black"><?php the_sub_field('title'); ?></span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="large-copy-wrap content-wrap content-offset-wrap our-word-wrap no-bottom">
                <div class="our-word animate-in">
                    <div class="large-quote green"><?php the_field('team_intro_quote'); ?></div>
                </div>

                <div class="animate-in">
                    <div class="h-s upper">
                        <?php the_field('team_support_1'); ?>
                        <div class="icon-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/library/images/icon-ourword.svg">
                        </div>
                    </div>
                    <div class="h-m smaller black"><?php the_field('team_support_2'); ?></div>
                    <div class="courier-headline"><?php the_field('team_support_3'); ?></div>
                </div>
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
