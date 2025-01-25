<?php

//disable wp-admin file editor
define('DISALLOW_FILE_EDIT', true);

if(!defined('THEME_URL'))
	define('THEME_URL', get_bloginfo('template_directory'));

// fix db after server move
// require_once( TEMPLATEPATH.'/library/includes/mysql-replace.php' );
// MySQL_Replace::replace('old', 'new');

//	dependicies
require_once( TEMPLATEPATH.'/library/includes/wp-header-remove.php' );

function my_theme_setup() {
    // Add theme support for menus
    add_theme_support('menus');

    // Register multiple menus (optional)
    register_nav_menus(array(
        'primary' => __('Main Menu', 'Spry25'),
        'footer1'  => __('Footer Menu 1', 'Spry25'),
        'footer2'  => __('Footer Menu 2', 'Spry25')
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

/**
 *	Add Scripts
 *	Utilizes wp_enqueue_scripts to add
 *	required scripts
 *
 *	@return void
 */
add_action( 'wp_enqueue_scripts', 'magneti_enqueue_scripts' );

function magneti_enqueue_scripts() {
	if( is_admin() )
		return false;
	
	//register
  	wp_register_style( 'template-stylesheet', get_theme_file_uri() . '/library/css/style.min.css', array(), '10.3', 'all' );
	wp_register_script( 'lib', THEME_URL.'/library/js/lib.js', array( 'jquery' ), '10.0' );
	wp_register_style( 'slick-stylesheet', get_theme_file_uri() . '/library/includes/slick/slick.css', array(), '1.0', 'all' );
	wp_register_script( 'slick', THEME_URL.'/library/includes/slick/slick.min.js', array( 'jquery' ), '1.0' );
    //wp_register_script( 'scrollmagic', THEME_URL.'/library/js/scrollmagic/ScrollMagic.min.js', array( 'jquery' ), '' );
    //wp_register_script( 'smplugin1', THEME_URL.'/library/js/greensock/TweenMax.min.js', array( 'jquery' ), '' );
    //wp_register_script( 'smplugin2', THEME_URL.'/library/js/greensock/easing/EasePack.min.js', array( 'jquery' ), '' );
    //wp_register_script( 'smplugin3', THEME_URL.'/library/js/scrollmagic/plugins/animation.gsap.min.js', array( 'jquery' ), '' );
    //wp_register_script( 'smplugin4', THEME_URL.'/library/js/greensock/plugins/ScrollToPlugin.min.js', array( 'jquery' ), '' );

	//enqueue
	wp_enqueue_style( 'template-stylesheet' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'lib' );
	wp_enqueue_style( 'slick-stylesheet' );
	wp_enqueue_script( 'slick' );

	//localize
	wp_localize_script('lib', 'SPRY', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
		'siteurl' => get_option('siteurl')
	));
}

// Allow SVG uploads
function allow_custom_uploads( $mime_types ) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter( 'upload_mimes', 'allow_custom_uploads' );

// Custom primary nav walker to add SVG divider
class Custom_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Output the link
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';
        $output .= '<a href="' . esc_url($item->url) . '">' . apply_filters('the_title', $item->title, $item->ID) . '</a>';
        $output .= '</li>';

        // Add the SVG divider for all but the last item
        if (!empty($args->after_divider)) {
            $output .= '<span class="nav-divider">';
            $output .= '<svg width="17" height="27" viewBox="0 0 17 27" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="15.933" y1="0.259644" x2="0.933011" y2="26.2404" stroke="white"/></svg>';
            $output .= '</span>';
        }
    }
}

// Register Custom Post Type: Work
function create_work_post_type() {
    $labels = array(
        'name'                  => _x('Work', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Work', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Work', 'textdomain'),
        'name_admin_bar'        => __('Work', 'textdomain'),
        'archives'              => __('Work Archives', 'textdomain'),
        'attributes'            => __('Work Attributes', 'textdomain'),
        'parent_item_colon'     => __('Parent Work:', 'textdomain'),
        'all_items'             => __('All Work', 'textdomain'),
        'add_new_item'          => __('Add New Work', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Work', 'textdomain'),
        'edit_item'             => __('Edit Work', 'textdomain'),
        'update_item'           => __('Update Work', 'textdomain'),
        'view_item'             => __('View Work', 'textdomain'),
        'view_items'            => __('View Work', 'textdomain'),
        'search_items'          => __('Search Work', 'textdomain'),
        'not_found'             => __('Not found', 'textdomain'),
        'not_found_in_trash'    => __('Not found in Trash', 'textdomain'),
        'featured_image'        => __('Featured Image', 'textdomain'),
        'set_featured_image'    => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image'    => __('Use as featured image', 'textdomain'),
        'insert_into_item'      => __('Insert into Work', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this Work', 'textdomain'),
        'items_list'            => __('Work list', 'textdomain'),
        'items_list_navigation' => __('Work list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter Work list', 'textdomain'),
    );

    $args = array(
        'label'                 => __('Work', 'textdomain'),
        'description'           => __('A custom post type for showcasing work or projects', 'textdomain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type('work', $args);
}

add_action('init', 'create_work_post_type', 0);

// ACF admin title
/*
function my_acf_flexible_content_layout_title($title, $field, $layout, $i) {
    $admin_title = get_sub_field('admin_title');

    if ($admin_title) {
        $title .= ' - ' . esc_html($admin_title);
    }

    return $title;
}
add_filter('acf/fields/flexible_content/layout_title', 'my_acf_flexible_content_layout_title', 10, 4);
*/

/*
class Your_ACF_Class {
    
    public function __construct() {
        // Hook the collapse function into the ACF admin footer
        add_action('acf/input/admin_footer', [$this, 'collapse_layout_fields']);
    }

    public function collapse_layout_fields() {
        ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                let collapseButtonClass = 'collapse-all';

                // Add a clickable link to the label line of flexible content fields
                let flexibleContentFields = document.querySelectorAll('.acf-field-flexible-content');
                for (let i = 0; i < flexibleContentFields.length; i++) {
                    let label = flexibleContentFields[i].querySelector('.acf-label');
                    label.innerHTML += '<a class="' + collapseButtonClass + '" style="position: absolute; top: 0; right: 0; cursor: pointer;">Collapse All</a>';
                }

                // Simulate a click on each flexible content item's "collapse" button when clicking the new link
                let collapseButtons = document.querySelectorAll('.' + collapseButtonClass);
                for (let i = 0; i < collapseButtons.length; i++) {
                    collapseButtons[i].addEventListener('click', function() {
                        let flexibleContent = this.closest('.acf-field-flexible-content').querySelector('.acf-flexible-content');
                        let layoutItems = flexibleContent.querySelectorAll('.layout');
                        for (let j = 0; j < layoutItems.length; j++) {
                            // Trigger the collapse
                            let collapseControl = layoutItems[j].querySelector('.acf-icon.-collapse');
                            if (collapseControl) {
                                collapseControl.click(); // Trigger the click event to collapse
                            }
                        }
                    });
                }
            });
        </script>
        <?php
    }
}

// Instantiate your class
new Your_ACF_Class();
*/

// SEND TO CM
function __send_to_cm( $fields, $api, $list ) {
    
    //validate api & list
    if(empty($api) || empty($list))
        return false;

    require_once( TEMPLATEPATH.'/library/includes/cm/csrest_subscribers.php' );

    $wrap = new CS_REST_Subscribers($list, $api);


    $result = $wrap->add(array(
        'Name'  => $fields['name'],
        'EmailAddress' => $fields['email'],
        'CustomFields' => isset($fields['custom']) ? $fields['custom'] : array(),
        'Resubscribe' => true
    ));
        
    if($result->was_successful())
        return true;
    else
        return false;
        
}

// PEOPLE FORM SUBMIT
add_action( 'wp_ajax_peoplesubmit', '_peoplesubmit' );
add_action( 'wp_ajax_nopriv_peoplesubmit', '_peoplesubmit' );

function _peoplesubmit() {
    $fields0 = array(
        'work_type'         =>  $_POST['work_type']
    );
    $fields1 = array(
        'trade'             =>  $_POST['trade']
    );
    $fields2 = array(       
        'full_name'         =>  filter_var( $_POST['full_name'], FILTER_SANITIZE_STRING ),
        'located_where'     =>  filter_var( $_POST['located_where'], FILTER_SANITIZE_STRING ),
        'email'             =>  filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL ),
        'their_work'        =>  filter_var( $_POST['their_work'], FILTER_SANITIZE_STRING ),
        'message'           =>  filter_var( $_POST['message'], FILTER_SANITIZE_STRING )
    );
    
    $ers = array();

    if( empty($fields0['work_type']) )
        $ers[] = 'work_type';

    if( empty($fields1['trade']) )
        $ers[] = 'trade';
    
    if( empty($fields2['full_name']) )
        $ers[] = 'full_name';

    if( empty($fields2['located_where']) )
        $ers[] = 'located_where';
        
    if( empty($fields2['email']) )
        $ers[] = 'email';

    if( empty($fields2['their_work']) )
        $ers[] = 'their_work';
    
    if( empty($fields2['message']) )
        $ers[] = 'message';

    if( !empty($ers) ) {
        
        //errors
        die(json_encode(array(
            'code' => 0,
            'message' => 'The highlighted fields are required',
            'fields' => $ers
        )));
        
    } else {
        
        $headers = "From: no-reply@wearespry.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $body = "Someone is interested in working with you.<br /><br />";
    
        foreach( $fields0 as $k => $v ) {
            $body .= 'Work Type: <br />';
            foreach( $v as $x => $y ) {
                $body .= '- ' . ucwords( stripslashes($y) ) . '<br />';
            }
            $body .= '<br />';
        }

        foreach( $fields1 as $k => $v ) {
            $body .= 'Trade: <br />';
            foreach( $v as $x => $y ) {
                $body .= '- ' . ucwords( stripslashes($y) ) . '<br />';
            }
            $body .= '<br />';
        }

        foreach( $fields2 as $k => $v )
            $body .= ucwords( str_replace('_', ' ', $k) ) . ': ' . stripslashes($v) . '<br />';
    
        //mail('hello@wearespry.com', 'People Form Submit', $body, $headers);
        mail('gallantcodes@gmail.com', 'People Form Submit', $body, $headers);

        //insert to CM
        /*
        $list_id = '8e035f68c31fa793fe19d8f4025177fc';
        $client_id = '41f7dd5079df8b732ad21bc7de3a30ec';
        $client_api_key = '8cfd489f921f98d2c53fe38ae1fc07d9c4fd7cb9e540e303';

        $custom_fields = array(
            array(
                'Key' => 'located_where',
                'Value' => $fields2['located_where']
            ),
            array(
                'Key' => 'their_work',
                'Value' => $fields2['their_work']
            ),
            array(
                'Key' => 'message',
                'Value' => $fields2['message']
            )
        );

        //work types
        foreach( $fields0['work_type'] as $type ) {
            $custom_fields[] = array(
                'Key' => 'work_type',
                'Value' => $type
            );
        }

        //work types
        foreach( $fields1['trade'] as $type ) {
            $custom_fields[] = array(
                'Key' => 'trade',
                'Value' => $type
            );
        }

        __send_to_cm( array(
            'name' => $fields2['full_name'],
            'email' => $fields2['email'],
            'custom' => $custom_fields
        ), $client_api_key, $list_id );
        */

        //errors
        die(json_encode(array(
            'code' => 1
        )));

    }
}

// CONTACT FORM SUBMIT
add_action( 'wp_ajax_contactsubmit', '_contactsubmit' );
add_action( 'wp_ajax_nopriv_contactsubmit', '_contactsubmit' );

function _contactsubmit() {
    $fields = array(       
        'first_name'        =>  filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING ),
        'last_name'         =>  filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING ),
        'email'             =>  filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL ),
        'message'           =>  filter_var( $_POST['message'], FILTER_SANITIZE_STRING )
    );
    
    $ers = array();
    
    if( empty($fields['first_name']) )
        $ers[] = 'first_name';

    if( empty($fields['last_name']) )
        $ers[] = 'last_name';
        
    if( empty($fields['email']) )
        $ers[] = 'email';
    
    if( empty($fields['message']) )
        $ers[] = 'message';

    if( !empty($ers) ) {
        
        //errors
        die(json_encode(array(
            'code' => 0,
            'message' => 'The highlighted fields are required',
            'fields' => $ers
        )));
        
    } else {
        
        $headers = "From: no-reply@wearespry.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $body = "Someone has contacted you.<br /><br />";

        foreach( $fields as $k => $v )
            $body .= ucwords( str_replace('_', ' ', $k) ) . ': ' . stripslashes($v) . '<br />';
    
        //mail('hello@wearespry.com', 'People Form Submit', $body, $headers);
        mail('gallantcodes@gmail.com', 'People Form Submit', $body, $headers);

        //insert to CM
        /*
        $list_id = '8e035f68c31fa793fe19d8f4025177fc';
        $client_id = '41f7dd5079df8b732ad21bc7de3a30ec';
        $client_api_key = '8cfd489f921f98d2c53fe38ae1fc07d9c4fd7cb9e540e303';

        $custom_fields = array(
            array(
                'Key' => 'message',
                'Value' => $fields['message']
            )
        );

        __send_to_cm( array(
            'name' => $fields2['full_name'],
            'email' => $fields2['email'],
            'custom' => $custom_fields
        ), $client_api_key, $list_id );
        */

        //errors
        die(json_encode(array(
            'code' => 1
        )));

    }
}
