<?php
get_header();
?>

<main id="content" class="main">
    <section class="form-primary-wrap primary-page-wrap standard-page-wrap">
        <div class="bg-part full green"></div>

        <div class="intro-text-part white animate-in">
            <div class="center">
                <h1 class="h-l yellow"><?php the_title(); ?></h1>
            </div>
        </div>
    </section>

    <section class="people-cta">
        <div class="bg-part full cream"></div>

        <div class="center animate-in">
            <div class="content-inner-normal-page-wrap">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>