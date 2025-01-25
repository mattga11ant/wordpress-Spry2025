<?php 
/* Template Name: People */
get_header();
?>

<main id="content" class="main">
    <section class="form-primary-wrap">
        <div class="bg-part full green"></div>

        <div class="intro-text-part white animate-in">
            <div class="center">
                <h1 class="h-l yellow">Seeking creative, creatives.</h1>
                <p>We work everywhere—and we’re always looking to grow our team. If you share our vision, love what you do, and hustle hard, we want to meet you.</p>
                <p>Fill out the form below and let’s connect.</p>
            </div>
        </div>

        <div class="people-form-wrap-section">
            <div class="center">

                <form action="<?php echo get_option('siteurl'); ?>" method="post" id="people-form" class="animate-in">

                    <div class="form-top-message">All fields are required.</div>

                    <div class="form-row row-1">
                        <div class="form-row-label courier-headline white">Are you looking for full-time or freelance?</div>
                        <div class="row-inputs">
                            <div class="row-checkbox wide">
                                <input type="checkbox" id="freelance" class="custom-checkbox sr-only" name="work_type[]" value="freelance">
                                <label for="freelance">FREELANCE</label>
                            </div>
                            <div class="row-checkbox wide">
                                <input type="checkbox" id="fulltime" class="custom-checkbox sr-only" name="work_type[]" value="full-time">
                                <label for="fulltime">FULL-TIME</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-2">
                        <div class="form-row-label courier-headline white">Select your trade.</div>
                        <div class="row-inputs">
                            <div class="row-checkbox">
                                <input type="checkbox" id="dp" class="custom-checkbox sr-only" name="trade[]" value="DP">
                                <label for="dp">DP</label>
                            </div>
                            <div class="row-checkbox">
                                <input type="checkbox" id="photographer" class="custom-checkbox sr-only" name="trade[]" value="photographer">
                                <label for="photographer">PHOTOGRAPHER</label>
                            </div>
                            <div class="row-checkbox">
                                <input type="checkbox" id="producer" class="custom-checkbox sr-only" name="trade[]" value="producer">
                                <label for="producer">PRODUCER</label>
                            </div>
                            <div class="row-checkbox">
                                <input type="checkbox" id="camera_op" class="custom-checkbox sr-only" name="trade[]" value="camera op or asst">
                                <label for="camera_op">CAM OP / ASST.</label>
                            </div>
                            <div class="row-checkbox">
                                <input type="checkbox" id="drone_pilot" class="custom-checkbox sr-only" name="trade[]" value="drone pilot">
                                <label for="drone_pilot">DRONE PILOT</label>
                            </div>
                            <div class="row-checkbox">
                                <input type="checkbox" id="food_stylist" class="custom-checkbox sr-only" name="trade[]" value="food stylist">
                                <label for="food_stylist">FOOD STYLIST</label>
                            </div>
                            <div class="row-checkbox">
                                <input type="checkbox" id="art" class="custom-checkbox sr-only" name="trade[]" value="art dept">
                                <label for="art">ART DEPT.</label>
                            </div>
                            <div class="row-checkbox">
                                <input type="checkbox" id="HandMU_artist" class="custom-checkbox sr-only" name="trade[]" value="HandMU artist">
                                <label for="HandMU_artist">H&amp;MU ARTIST</label>
                            </div>
                            <div class="row-checkbox">
                                <input type="checkbox" id="pa" class="custom-checkbox sr-only" name="trade[]" value="PA">
                                <label for="pa">PA</label>
                            </div>
                            <div class="row-checkbox">
                                <input type="checkbox" id="other" class="custom-checkbox sr-only" name="trade[]" value="other">
                                <label for="other">OTHER</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-3 text-input-row">
                        <div class="row-inputs2">
                            <div class="text-input-field">
                                <label for="full_name" class="courier-headline white">What’s Your Name?</label>
                                <input type="text" name="full_name" value="" placeholder="First and Last Name" id="full_name" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-4 text-input-row">
                        <div class="row-inputs2">
                            <div class="text-input-field">
                                <label for="located_where" class="courier-headline white">Where are you located?</label>
                                <input type="text" name="located_where" value="" placeholder="Where you’re typically available for work. Be specific." id="located_where" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-5 text-input-row">
                        <div class="row-inputs2">
                            <div class="text-input-field">
                                <label for="email" class="courier-headline white">What’s your email address?</label>
                                <input type="text" name="email" value="" placeholder="Best email address for business inquires." id="email" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-6 text-input-row">
                        <div class="row-inputs2">
                            <div class="text-input-field">
                                <label for="their_work" class="courier-headline white">Where can we see your work?</label>
                                <input type="text" name="their_work" value="" placeholder="Enter the link to your website, online samples, or resumé." id="their_work" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-7 text-input-row">
                        <div class="row-inputs2">
                            <div class="text-input-field">
                                <label for="message" class="courier-headline white">Anything else to add?</label>
                                <textarea name="message" placeholder="Enter a short message here without links." id="message"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="submit-error-row">
                        <input type="hidden" name="action" value="peoplesubmit" />
                        <input type="submit" value="SUBMIT" id="contact-form-submit" />
                        <div id="form-error"></div>
                    </div>

                </form>

                <div id="form-thank-you">Thank you for the submission. We will be in touch.</div>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>