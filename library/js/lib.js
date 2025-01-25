jQuery(document).ready(function($) {
    var ajax_url = SPRY.ajaxurl;

    /*
    // Mobile Navigation Toggle
    $('#mobile-nav-trigger').on('click', function() {
        var isExpanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !isExpanded);
        var $nav = $('#navigation-wrap');
        var $header = $('header');
        $nav.attr('aria-hidden', isExpanded);

        if (isExpanded) {
            $nav.slideUp(200); // Close the navigation
            $(this).removeClass('open'); // Remove 'open' class from the trigger
            $header.removeClass('open');
        } else {
            $nav.slideDown(200); // Open the navigation
            $(this).addClass('open'); // Add 'open' class to the trigger
            $header.addClass('open');
        }
    });
    */

    // Show nav after a .2 second delay
    setTimeout(function() {
      $('#main-site-header').addClass('show');
    }, 200);

    // Header Scroll Detection
    var lastScrollTop = 0;

    $(document).ready(function() {
        // Initially add 'top' class
        $('#main-site-header').addClass('top');

        $(window).scroll(function() {
            var scrollTop = $(window).scrollTop();

            // Detect scroll direction and show/hide navigation accordingly
            if (scrollTop > lastScrollTop && scrollTop >= 50) {
                // Scrolling down and past 35px
                if (!$('#main-site-header').hasClass('scrolled-nav')) {
                    $('#main-site-header').removeClass('top').addClass('scrolled-nav');
                }
            } else if (scrollTop < lastScrollTop) {
                // Scrolling up
                // $('#main-site-header').removeClass('scrolled-nav');

                if (scrollTop <= 0) {
                    // Back to the top of the page
                    $('#main-site-header').removeClass('scrolled-nav');
                    $('#main-site-header').addClass('top');
                }
            }

            lastScrollTop = scrollTop;
        });
    });

	// Intersection Observer for animate-in elements with adjusted trigger point
    const options = {
        root: null,  // Use the viewport as the container
        rootMargin: '0px 0px -20%',  // Adjust to trigger when 20% of viewport is passed
        threshold: 0  // Trigger when the element crosses the rootMargin line
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                $(entry.target).addClass('in-view');
                observer.unobserve(entry.target);  // Remove observation after triggering
            }
        });
    }, options);

    // Select and observe all elements with the .animate-in class
    $('.animate-in').each(function() {
        observer.observe(this);
    });

    // people form submit
    $('#people-form').on('submit', function(evt) { 
        var form = $(this),
            errorField = $('#form-error'),
            successField = $('#form-thank-you');
        
        //remove errors
        errorField.text('');
        
        //send  
        $.ajax({
            url: ajax_url,
            type: 'POST',
            data: form.serialize(),
            success: function(result) {

                console.log(result);

                var data = JSON.parse( result );
                
                //errors ?
                if( data.fields ) {
                    errorField.text('All fields are required.');
                }
                
                //reset form?
                if( data.code && data.code == 1 ) {
                    form.stop().slideUp(200);
                    successField.stop().fadeIn(200);
                }
            }
        });
        
        return false;    
    });

    // contact form submit
    $('#contact-form').on('submit', function(evt) { 
        var form = $(this),
            errorField = $('#form-error-2'),
            successField = $('#form-thank-you-2');
        
        //remove errors
        errorField.text('');
        
        //send  
        $.ajax({
            url: ajax_url,
            type: 'POST',
            data: form.serialize(),
            success: function(result) {

                console.log(result);

                var data = JSON.parse( result );
                
                //errors ?
                if( data.fields ) {
                    errorField.text('All fields are required.');
                }
                
                //reset form?
                if( data.code && data.code == 1 ) {
                    form.stop().slideUp(200);
                    successField.stop().fadeIn(200);
                }
            }
        });
        
        return false;    
    });
});
