<?php 
/* Template Name: Contact */
get_header();
?>

<main id="content" class="main">
    <section class="form-primary-wrap">
        <div class="bg-part full green"></div>

        <div class="intro-text-part less white animate-in">
            <div class="center">
                <h1 class="h-l yellow">Let’s tell <br>your story.</h1>
                <p>We’re always down for a chat. Whether you’re looking for creative collaboration, production support, or just want to talk, give us a call at <a href="tel:+14079823051">+1 (407) 982-3051</a>.</p>
                <p>Together, we can make something great.</p>
            </div>
        </div>

        <div class="contact-form-wrap-section">
            <div class="center animate-in">

                <form action="<?php echo get_option('siteurl'); ?>" method="post" id="contact-form">
                    <div class="text-input-row-contact">
                        <div class="contact-inputs">
                            <div class="text-input-field-contact">
                                <label for="first_name" class="sr-only">First Name</label>
                                <input type="text" name="first_name" value="" placeholder="First Name" id="contact_first_name" />
                            </div>
                            <div class="text-input-field-contact">
                                <label for="last_name" class="sr-only">Last Name</label>
                                <input type="text" name="last_name" value="" placeholder="Last Name" id="contact_last_name" />
                            </div>
                        </div>
                    </div>

                    <div class="text-input-row-contact">
                        <div class="text-input-field-contact">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="email" value="" placeholder="Email" id="contact_email" />
                        </div>
                    </div>

                    <div class="text-input-row-contact">
                        <div class="text-input-field-contact">
                            <label for="message" class="sr-only">Message</label>
                            <textarea name="message" placeholder="Message" id="contact_message"></textarea>
                        </div>
                    </div>

                    <div class="submit-error-row">
                        <input type="hidden" name="action" value="contactsubmit" />
                        <input type="submit" value="Submit" id="contact-form-submit-2" />
                        <div id="form-error-2"></div>
                    </div>

                </form>

                <div id="form-thank-you-2">Thank you for the submission. We will be in touch.</div>

            </div>
        </div>
    </section>

    <section class="people-cta">
        <div class="bg-part full cream"></div>

        <div class="center animate-in">
            <div class="inner-wrap">
                <div class="content-part">
                    <a href="/people/" class="h-m2 green">Seeking creative, creatives.</a>
                    <a href="/people/" class="courier-headline black">Join our team of thinkers and makers.</a>
                </div>
                <div class="image-part">
                    <a href="/people/" class="img-wrap" style="background: url(<?php bloginfo('template_directory'); ?>/library/images/support-contact.jpg) no-repeat center center; background-size: cover;">
                        <div class="circle-callout lets-work">
                            <span class="main-label">Let's Work</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>