<?php

class Slicky_Carousel extends WP_Widget{

    //if I was going to do this again, I'd make a class with these values as properties instead of a huge array
    private $carousel_options = array(
        array(
            'title' => 'Accessibility',
            'label_for' => 'carousel-accessibility',
            'option_name' => 'accessibility',
            'default_value' => 1,
            'description' => 'Enables tabbing and arrow key navigation',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Adaptive Height',
            'label_for' => 'carousel-adaptive-height',
            'option_name' => 'adaptiveHeight',
            'default_value' => 0,
            'description' => 'Enables adaptive height for single slide horizontal carousels',
            'type' => 'checkbox'
        ),
        array(
            'title' => 'Autoplay',
            'label_for' => 'carousel-autoplay',
            'option_name' => 'autoplay',
            'default_value' => 0,
            'description' => 'Enables autoplay',
            'type' => 'checkbox'
        ),
        array(
            'title' => 'Autoplay speed',
            'label_for' => 'carousel-autoplay-speed',
            'option_name' => 'autoplaySpeed',
            'default_value' => 3000,
            'description' => 'Autoplay speed in milliseconds (only relevant if autoplay is enabled).',
            'type' => 'integer'
        ),
        array(
            'title' => 'Arrows',
            'label_for' => 'carousel-arrows',
            'option_name' => 'arrows',
            'default_value' => 1,
            'description' => 'Show prev/next arrows',
            'type' => 'checkbox'
        ),
        array(
            'title' => 'Previous Arrow',
            'label_for' => 'carousel-prevArrow',
            'option_name' => 'prevArrow',
            'default_value' => '<button type=\'button\' class=\'slick-prev\'>Previous</button>',
            'description' => 'Customize the "Previous" arrow HTML (also will accept jQuery selector, if you know one)',
            'type' => 'text'
        ),
        array(
            'title' => 'Next Arrow',
            'label_for' => 'carousel-nextArrow',
            'option_name' => 'nextArrow',
            'default_value' => '<button type=\'button\' class=\'slick-next\'>Next</button>',
            'description' => 'Customize the "Next" arrow HTML (also will accept jQuery selector, if you know one)',
            'type' => 'text'
        ),
        array(
            'title' => 'Center Mode',
            'label_for' => 'carousel-center-mode',
            'option_name' => 'centerMode',
            'default_value' => 0,
            'description' => 'Enables center view with partial prev/next slides. Use with odd-numbered slidesToShow counts',
            'type' => 'checkbox'
        ),
        array(
            'title' => 'Center Padding',
            'label_for' => 'carousel-center-padding',
            'option_name' => 'centerPadding',
            'default_value' => '50px',
            'description' => 'Side padding when in center mode (px or %)',
            'type' => 'text',
        ),
        array(
            'title' => 'CSS Ease',
            'label_for' => 'carousel-css-ease',
            'option_name' => 'cssEase',
            'default_value' => 'ease',
            'description' => 'CSS3 animation easing (see <a href="https://www.w3schools.com/cssref/css3_pr_animation-timing-function.asp" target="_blank">W3Schools</a>)',
            'type' => 'text',
        ),
        array(
            'title' => 'Dots',
            'label_for' => 'carousel-dots',
            'option_name' => 'dots',
            'default_value' => 0,
            'description' => 'Show dot indicators',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Dots Class',
            'label_for' => 'carousel-dots-class',
            'option_name' => 'dotsClass',
            'default_value' => 'slick-dots',
            'description' => 'Class for slide indicator dots container',
            'type' => 'text',
        ),
        array(
            'title' => 'Draggable',
            'label_for' => 'carousel-draggable',
            'option_name' => 'draggable',
            'default_value' => 1,
            'description' => 'Enable mouse dragging',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Fade',
            'label_for' => 'carousel-fade',
            'option_name' => 'fade',
            'default_value' => 0,
            'description' => 'Enable fade on transition',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Focus On Select',
            'label_for' => 'carousel-focus-on-select',
            'option_name' => 'focusOnSelect',
            'default_value' => 0,
            'description' => 'Enable focus on selected element (click)',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Easing',
            'label_for' => 'carousel-easing',
            'option_name' => 'easing',
            'default_value' => 'linear',
            'description' => 'Add easing for jQuery animate. Use with easing libraries or default easing methods',
            'type' => 'text',
        ),
        array(
            'title' => 'Edge Friction',
            'label_for' => 'carousel-edge-friction',
            'option_name' => 'edgeFriction',
            'default_value' => 0.15,
            'description' => 'Resistance when swiping edges of non-infinite carousels',
            'type' => 'decimal',
        ),
        array(
            'title' => 'Infinite Loop',
            'label_for' => 'carousel-infinite',
            'option_name' => 'infinite',
            'default_value' => 1,
            'description' => 'Infinite loop sliding',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Lazy Loading',
            'label_for' => 'carousel-lazyload',
            'option_name' => 'lazyLoad',
            'default_value' => 'ondemand',
            'description' => 'Set lazy loading technice. Accepts "ondemand" or "progressive"',
            'type' => 'text',
        ),
        //array(
        //    'title' => 'Mobile First',
        //    'label_for' => 'carousel-mobile-first',
        //    'option_name' => 'mobileFirst',
        //    'default_value' => 0,
        //    'description' => 'Responsive settins use mobile first calculation',
        //    'type' => 'checkbox',
        //),
        array(
            'title' => 'Pause on Focus',
            'label_for' => 'carousel-pause-focus',
            'option_name' => 'pauseOnFocus',
            'default_value' => 1,
            'description' => 'Pause autoplay on focus event (autoplay must be turned on to be effective)',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Pause on Hover',
            'label_for' => 'carousel-pause-hover',
            'option_name' => 'pauseOnHover',
            'default_value' => 1,
            'description' => 'Pause autoplay on hover event (autoplay must be turned on to be effective)',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Pause on Dots Hover',
            'label_for' => 'carousel-pause-dots-hover',
            'option_name' => 'pauseOnDotsHover',
            'default_value' => 0,
            'description' => 'Pause autoplay when a dot is hovered (autoplay must be turned on)',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Number of Rows',
            'label_for' => 'carouseel-rows',
            'option_name' => 'rows',
            'default_value' => '1',
            'description' => 'Setting this to more than one initializes grid mode. Use Slides Per Row to set how many slides should be in each row.',
            'type' => 'integer',
        ),
        ////slide??
        array(
            'title' => 'Slides Per Row',
            'label_for' => 'carousel-slides-per-row',
            'option_name' => 'slidesPerRow',
            'default_value' => '1',
            'description' => 'With grid mode intialized via the rows option, this sets how many slides are in each grid row',
            'type' => 'integer',
        ),
        array(
            'title' => 'Slides To Show',
            'label_for' => 'carousel-slides-to-show',
            'option_name' => 'slidesToShow',
            'default_value' => '1',
            'description' => 'Number of slides to show',
            'type' => 'integer',
        ),
        array(
            'title' => 'Slides to Scroll',
            'label_for' => 'carousel-slides-to-scroll',
            'option_name' => 'slidesToScroll',
            'default_value' => '1',
            'description' => 'Number of slides to scroll on click / swipe',
            'type' => 'integer',
        ),
        array(
            'title' => 'Speed',
            'label_for' => 'carousel-transition-speed',
            'option_name' => 'speed',
            'default_value' => '300',
            'description' => 'Slide/fade animation speed',
            'type' => 'integer',
        ),
        array(
            'title' => 'Swipe',
            'label_for' => 'carousel-swipe',
            'option_name' => 'swipe',
            'default_value' => 1,
            'description' => 'Enable/Disable swiping',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Swipe to slide',
            'label_for' => 'carousel-swipe-to-slide',
            'option_name' => 'swipeToSlide',
            'default_value' => 0,
            'description' => 'Allow users to drag or swipe directly to a slide irrespective of slidesToScroll',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Touch move',
            'label_for' => 'carousel-touchmove',
            'option_name' => 'touchMove',
            'default_value' => 1,
            'description' => 'Enable/disable slide motion with touch',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Touch threshold',
            'label_for' => 'carousel-touch-threshold',
            'option_name' => 'touchThreshold',
            'default_value' => '5',
            'description' => 'To advance slides, the user must swipe a length of (1/threshold)*the width of the slider',
            'type' => 'integer',
        ),
        array(
            'title' => 'Variable Width Slides',
            'label_for' => 'carousel-variable-width',
            'option_name' => 'variableWidth',
            'default_value' => 0,
            'description' => 'Enable support for variable width slides. If your images are not all the same size, select this.',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Vertical Slide Mode',
            'label_for' => 'carousel-vertical',
            'option_name' => 'vertical',
            'default_value' => 0,
            'description' => 'Enables vertical slide mode',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Vertical Swiping',
            'label_for' => 'carousel-vertical-swiping',
            'option_name' => 'verticalSwiping',
            'default_value' => 0,
            'description' => 'Enable vertical swiping mode',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Right to Left',
            'label_for' => 'carousel-rtl',
            'option_name' => 'rtl',
            'default_value' => 0,
            'description' => 'Invert the direction of the carousel to become right-to-left',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Wait for Animate',
            'label_for' => 'carousel-wfa',
            'option_name' => 'waitForAnimate',
            'default_value' => 1,
            'description' => 'Ignores requests to advance the slide while animating',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Z-index',
            'label_for' => 'carousel-zindex',
            'option_name' => 'zindex',
            'default_value' => '1000',
            'description' => 'Set the z-index values for slides (useful for IE9 and older)',
            'type' => 'integer',
        ),
        array(
            'title' => 'Unslick',
            'label_for' => 'carousel-unslick',
            'option_name' => 'unslick',
            'default_value' => 0,
            'description' => 'Disable the slider for this size of window AND SMALLER (Warning: Don\'t do this unless you understand the consequences. Original HTML will be rendered, and resizing the window larger than this size will not re-enable the slider. Once a slider is disabled, it is disabled until page reload.)',
            'type' => 'checkbox'
        ),
    );

    private $responsive_option = array(
        'title' => 'Responsive Design',
        'label_for' => 'carousel-responsive',
        'option_name' => 'responsive',
        'default_value' => 0,
        'description' => 'Set this option to enable responsive design settings. Additional tabs will appear, which will give you control over how the slider is handled as the size of the window changes.',
        'type' => 'checkbox',
    );

    private $tabs = array(
        'pv' => 'Preview',
        'cf' => 'Image Configuration',
        'lg' => 'Large Screens',
        'md' => 'Medium Screens',
        'sm' => 'Small Screens',
        'xs' => 'Mobile Screens'
    );

    private $option_prefix = "slicky-carousel-";
    private $admin_page_slug = 'slicky-carousel';
    private $breakpoints = array('786px', '992px', '1200px', 'all screens');
    private $dir_path;
    private $dir_url;

    //basic object setup
    public function __construct(){
        parent::__construct('slicky-carousel', 'Slicky Carousel', array(
            'description' => 'The visual representation of the Slick Carousel configured Carousel Options page'
        ));
        $this->dir_path = plugin_dir_path(__FILE__) . '../';
        $this->dir_url = plugin_dir_url(__FILE__) . '../';
    }

    //register all the hooks
    public function init(){
        add_action('admin_menu', array($this, 'add_admin_page'));
        add_action('admin_init', array($this, 'configure_options'));
        add_action('admin_enqueue_scripts', array($this, 'register_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
        add_action('after_setup_theme', array($this, 'register_image_sizes'));
        
        add_action('wp_ajax_slicky_carousel_add_image', array($this, 'add_image'));
        add_action('wp_ajax_slicky_carousel_drop_image', array($this, 'drop_image'));
        add_action('wp_ajax_slicky_carousel_update_destination', array($this, 'change_destination'));

        add_action('widgets_init', function(){ register_widget('Slicky_Carousel'); });
        
        add_filter('wp_prepare_attachment_for_js', array($this, 'prepare_attachments'),10,3);
    }

    //sets up all the scripts and styles, including front end variable localization
    public function register_scripts(){
        //slick script / style
        wp_register_script('slick-js', $this->dir_url.'slick/slick.min.js', array('jquery'), '1.8', true);
        wp_register_style('slick-css', $this->dir_url.'slick/slick.css', array(), '1.8', 'screen');
        wp_register_style('slick-css-theme', $this->dir_url.'slick/slick-theme.css', array(), '1.8', 'screen');
        wp_register_style('carousel-display-css', $this->dir_url.'css/carousel-display.css', array(), false, 'screen');

        //generic options string for the admin images ui
        $generic_options_string = "<optgroup><option value='-1'>Nowhere</option></optgroup>";
        $generic_options_string .= $this->generate_options_group('posts', null, array(
            'numberposts' => -1,
            'orderby' => 'date',
        ));
        //woocommerce support
        $generic_options_string .= $this->generate_options_group('products', null, array(
            'numberposts' => -1,
            'orderby' => 'date',
            'post_type' => 'product'
        ));
        
        //panel scripts
        wp_register_script('carousel-admin-js', $this->dir_url.'js/carousel-admin.js', array('jquery'), false, true); 
        wp_localize_script('carousel-admin-js', 'slickyCarousel', 
            array(
                'optionsString' => $generic_options_string,
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'addAction' => 'slicky_carousel_add_image',
                'dropAction' => 'slicky_carousel_drop_image',
                'changeDestinationAction' => 'slicky_carousel_update_destination'
            )
        );

        //wp color picker
        if(is_admin()){
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_script('carousel-widget-js', $this->dir_url.'js/carousel-widget.js', array('jquery','wp-color-picker'), false, true);
            wp_enqueue_style('wp-color-picker');
        }


        //render scripts
        wp_register_script('carousel-render-js', $this->dir_url.'js/carousel-render.js', array('jquery','slick-js'), false, true);
        $responsive_enabled = '1' === get_option($this->option_prefix.$this->responsive_option['option_name'].'-lg', '0');

        $slicky_settings = array();
        $this->parse_carousel_options($slicky_settings, 'lg');

        if($responsive_enabled){
            $responsive_settings = array();
            foreach(array('md','sm','xs') as $suffix){
                $size_setting = array();
                $size_setting['breakpoint'] = ($suffix == 'md') ? 1200 : (($suffix == 'sm') ? 992 : 768) ;
                $size_setting['settings'] = array();
                $this->parse_carousel_options($size_setting['settings'], $suffix, true);

                array_push($responsive_settings, $size_setting);
            }
            $slicky_settings['responsive'] = $responsive_settings;
        }

        wp_localize_script('carousel-render-js', 'slickySettings', array('all' => $slicky_settings));

        wp_register_style('carousel-admin-css', $this->dir_url.'css/carousel-admin.css');
    }


    //parses saved option values for rendering an object in wp_localize_script
    private function parse_carousel_options(&$arr, $suffix, $output_default = false){
        if(!is_array($arr) || empty($suffix)) 
            throw new Exception('Invalid parameters passed to Slicky_Carousel::parse_carousel_options');
        foreach($this->carousel_options as $option){
            $db_setting = get_option($this->option_prefix."{$option['option_name']}-$suffix", null);
            $default_set = false;
            if($db_setting == null || $db_setting == $option['default_value']){
                $db_setting = $option['default_value'];
                $default_set = true;
            }
            
            switch($option['type']){
                case "integer":
                    $db_setting = intval($db_setting);
                    break;
                case "decimal":
                    $db_setting = floatval($db_setting);
                    break;
                case "checkbox":
                    $db_setting = $db_setting == 1;
                    break; 
                default:
                    break;
            }
            if($default_set && !$output_default){
                continue;
            }

            $arr[$option['option_name']] = $db_setting;
        }
    
    }

    //utility function: generate an options string for a select input, 
    //used when generating the ui for the image upload admin
    private function generate_options_group($label, $selected, $args){
        $posts = get_posts($args);
        if(sizeof($posts) == 0) return "";
        return "<optgroup label='$label'>" . implode("", array_map(function($post) use ($selected){
            $selected_attr = selected($post->ID, $selected, false);
            return "<option value='{$post->ID}' $selected_attr>{$post->post_title}</option>";
        }, $posts)) . "</optgroup>" ;
    }

    //put the admin page in the admin
    public function add_admin_page(){
        add_theme_page('Carousel Options', 'Carousel Options', 'edit_theme_options', $this->admin_page_slug, array($this,'slicky_carousel_admin_content'));
    }

    //register images
    public function register_image_sizes(){
        add_image_size('slicky-carousel-display', 350, 600, true);
        add_image_size('slicky-carousel-admin-preview', 175, 300, true);
    }

    //output html for the admin panel, calling settings api functions
    public function slicky_carousel_admin_content(){
        if(!current_user_can('edit_theme_options')){
            wp_die(__('You do not have permission to access this page', 'sewchic'));
        }
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'cf';

        echo '<h1>Carousel Customization Options</h1>' ;
        echo '<h2 class="nav-tab-wrapper">';
        
        $responsive_enabled = get_option($this->option_prefix.$this->responsive_option['option_name'].'-lg');
        foreach($this->tabs as $key => $title){
            if(!$responsive_enabled && !in_array($key, array('pv', 'cf', 'lg'), true)){
                continue;
            } 
            $class = 'nav-tab';
            $class .= ($active_tab == $key) ? ' nav-tab-active' : '';
            echo "<a href='?page={$this->admin_page_slug}&tab=$key' class='$class'>$title</a>";
        }
        echo '</h2>';

        if(!in_array($active_tab, array('pv','cf'))){
            echo '<form action="options.php" method="POST">';
            settings_fields($this->option_prefix.'tab-'.$active_tab);
            submit_button();
        }
        do_settings_sections($this->option_prefix.'tab-'.$active_tab);
        if(!in_array($active_tab, array('pv','cf'))){
            submit_button();
            echo '</form>';
        }
    }

    //settings api setup for the admin panel
    public function configure_options(){
        //the preview section
        add_settings_section(
            $this->option_prefix.'section-preview',
            'Carousel Preview',
            array($this, 'output_admin_preview'),
            $this->option_prefix.'tab-pv'
        );

        //the settings section for uploading images
        add_settings_section(
            $this->option_prefix.'section-images',
            'Image upload and configuration',
            array($this, 'output_section_images_configs_for_admin'),
            $this->option_prefix.'tab-cf'
        );

        //tabs
        //the settings section for enabling the other tabs for responsive design settings
        add_settings_section(
            $this->option_prefix.'section-responsive',
            $this->responsive_option['title'],
            function(){},
            $this->option_prefix.'tab-lg'
        ); 

        add_settings_field(
            $this->option_prefix.$this->responsive_option['option_name'].'-lg',
            $this->responsive_option['title'],
            array($this, 'generic_input_callback'),
            $this->option_prefix.'tab-lg',
            $this->option_prefix.'section-responsive',
            $this->responsive_option
        );

        //register the only setting in the group
        register_setting(
            $this->option_prefix.'tab-lg',
            $this->option_prefix.$this->responsive_option['option_name'].'-lg'
        );


        foreach(array_slice($this->tabs, 2, 4, true) as $suffix => $title){
            add_settings_section(
                $this->option_prefix."section-$suffix",
                '',
                array($this, "section_header_$suffix"),
                $this->option_prefix."tab-$suffix" 
            );


            foreach($this->carousel_options as $option){
                $option['suffix'] = $suffix;
                add_settings_field(
                    $this->option_prefix."{$option['option_name']}-$suffix",
                    $option['title'],
                    array($this, 'generic_input_callback'),
                    $this->option_prefix."tab-$suffix",
                    $this->option_prefix."section-$suffix",
                    $option
                );
                register_setting(
                    $this->option_prefix."tab-$suffix",
                    $this->option_prefix."{$option['option_name']}-$suffix"
                );
            }
        }
    }

    //header callback functions for the different size tags
    public function section_header_lg(){
        echo '<h3>Full-screen and large view carousel settings</h3> <p class="description">The breakpoint for large screens is 1200 pixels</p> ';
    }

    public function section_header_md(){
        echo '<h3>Medium view carousel settings</h3> <p class="description">The breakpoint for medium screens is 992 pixels</p> ';
    }

    public function section_header_sm(){
        echo '<h3>Small view carousel settings</h3> <p class="description">The breakpoint for medium screens is 762 pixels</p> '; 
    }

    public function section_header_xs(){
        echo '<h3>Small and mobile view carousel settings</h3> <p class="description">These settings apply for any screen less than 762 pixels wide.</p> ';
    }

    //output a vanilla preview of the carousel
    public function output_admin_preview(){
        $args = array(
            'before_widget' => '<div class="slicky-carousel-widget" style="width:50%;margin:auto;">',
            'after_widget' => '</div>'
        );
        $this->widget($args, array('container_width' => "100%", 'arrow_color' => '#000000', 'breakpoint' => NULL));
    }

    //output the ui for adding images
    public function output_section_images_configs_for_admin(){
        wp_enqueue_media();
        wp_enqueue_script('carousel-admin-js');
        wp_enqueue_style('carousel-admin-css');
        $prefix = $this->option_prefix;
        //this array stores attachment ids of the images selected for the carousel and the posts they are supposed to link to 
        $elements = get_option($this->option_prefix.'elements',array()); 
        $images = array();
        

        foreach($elements as $el){
            $options_string = "<optgroup><option value='-1'>Nowhere</option></optgroup>";
            $options_string .= $this->generate_options_group('posts', $el['dest_id'], array(
                'numberposts' => -1,
                'orderby' => 'date',
            ));
            //woocommerce support
            $options_string .= $this->generate_options_group('products', $el['dest_id'], array(
                'numberposts' => -1,
                'orderby' => 'date',
                'post_type' => 'product'
            ));

            $images[] = array(
                'img_id' => $el['img_id'],
                'img_src' => wp_get_attachment_image_src($el['img_id'], 'slicky-carousel-admin-preview'),
                'dest_id' => $el['dest_id'],
                'options' => $options_string
            );
        }
        require_once $this->dir_path.'/templates/admin-config.php';
    }

    //ajax function for adding a new carousel image
    public function add_image(){
        //receives: img id
        //sets initial dest id to -1 (for nothing)
        //returns ok
        $elements = get_option($this->option_prefix.'elements', array());
        $elements[] = array(
            'img_id' => $_POST['attachmentId'],
            'dest_id' => -1
        ); 
        update_option($this->option_prefix.'elements', $elements);
        
        $result = array('result' => 'ok');
        echo json_encode($result);
        
        wp_die();
    }
    
    //ajax function for deleting a carousel item
    public function drop_image(){
        extract($_POST);
        error_log("received index to drop: $index");
        $elements = get_option($this->option_prefix.'elements', array());
        if(sizeof($elements) - 1 >= $index) { 
            array_splice($elements, $index, 1);
            //unset($elements[$index]);
            //$elements = array_values($elements);
            update_option($this->option_prefix.'elements', $elements);
            error_log("what's left of elements array after delete: ". json_encode($elements));
            echo json_encode(array("result" => "ok"));
        } else {
            error_log("no deletion occurred. index could not be located");
            echo json_encode(array("result" => "error", "message" => "index doesn't exist in db obj"));
        }
        wp_die();
    }

    //ajax function for changing where a carousel item goes
    public function change_destination(){
        extract($_POST); //index and dest
        $elements = get_option($this->option_prefix.'elements', array());
        if(sizeof($elements) - 1 >= $index && 0 <= $index){
            $elements[$index]['dest_id'] = $dest;
            update_option($this->option_prefix.'elements', $elements);
            error_log("elements array after destination change: ". json_encode($elements));
            echo json_encode(array("result" => 'ok'));
        } else {
            error_log("no update occured because the index was out of bounds");
            echo json_encode(array("result" => "error", "message" => "index received was out of bounds"));
        }
        wp_die();
    }

    //this makes the admin preview image size available to the wp.media object
    public function prepare_attachments($response, $attachment, $meta){
        $size = 'slicky-carousel-admin-preview';
        
        if(isset($meta['sizes'][$size])){
            $size_meta = $meta['sizes'][$size];
            $attachment_url = wp_get_attachment_url($attachment->ID);
            $base_url = str_replace(wp_basename($attachment_url), '', $attachment_url);

            $response['sizes'][$size] = array(
                'height' => $size_meta['height'],
                'width' => $size_meta['width'],
                'url' => $base_url . $size_meta['file'],
                'orientation' => $size_meta['height'] > $size_meta['width'] ? 'portrait' : 'landscape'
            );

        }
        return $response;
    }

    //this function outputs input elements for the admin tabs
    public function generic_input_callback($args){
        if(!isset($args['suffix'])) $args['suffix'] = 'lg';
        extract($args);
        $option = get_option("{$this->option_prefix}$option_name-$suffix");
        $option = ($option === false || (empty($option) && $type != 'checkbox')) ? $default_value : $option;

        $setDefaults = true;
        switch($type){
            case "checkbox":
                $value = '1';
                $checked = checked(1, $option, false);
                $style = '';
                $setDefaults = false;
                break;
            case "decimal":
                $type = 'number" step=".01';
                break;
            case "integer":
                $type = 'number';
                break;
            default: 
                break;
        }
        if($setDefaults){ //text (or similar)
            $value = $option;
            $checked = '';
            $style = "max-width:300px; width:100%;";
        }
        
        echo <<< EOT
            <input type="$type" name="{$this->option_prefix}$option_name-$suffix" style="$style" id="$label_for" value="$value" $checked />
EOT;
        if($type !== 'hidden'){
            echo <<< EOT
                <br /><span class="description">$description</span>
EOT;
        } 
    
    }

    //the following functions are for widget output and integration
    
    public function form($instance){
        //TODO:carousel alignment (left, right, center)
        $admin_url = admin_url("themes.php?page=slicky-carousel");
        echo "<p>For all settings other than container width, theme, and size, please visit the <a href='$admin_url'>carousel settings page</a></p>";
        if(!isset($instance['container_width'])) $instance['container_width'] = "100%";
        if(!isset($instance['arrow_color'])) $instance['arrow_color'] = '#ffffff';
        if(!isset($instance['responsive'])) $instance['responsive'] = 'off';
        if(!isset($instance['breakpoint'])) $instance['breakpoint'] = $this->breakpoints[0];

        $selected_bkpt = $instance['breakpoint'];
        $responsive_checked = checked($instance['responsive'], 'on', false);
        $breakpoint_disabled = $instance['responsive'] != 'on' ? 'disabled' : '';
        $breakpoint_display = $instance['responsive'] != 'on' ? 'style="display:none;"' : '';


        //outputting this form will require object methods, so can't template without doing major gymnastics
        $breakpoint_opts = implode("\r\n",array_map(function($bkpt) use ($selected_bkpt){ 
            return "<option ".selected($bkpt, $selected_bkpt, false).">$bkpt</option>"; 
        }, $this->breakpoints));

        if(isset($instance['errors'])){
            foreach($instance['errors'] as $error){
                echo "<div class='notice notice-error'><p>$error</p></div>";
            }
        }

        echo "<p>
                <label for='{$this->get_field_id('container_width')}'>Container Width (px or %)</label><br/>
                <input 
                    id='{$this->get_field_id('container_width')}'
                    name='{$this->get_field_name('container_width')}'
                    type='text'
                    value='{$instance['container_width']}'
                />
            </p>
            <p>
                <label for='{$this->get_field_id('arrow_color')}'>Arrow Color</label>
                <input 
                    id='{$this->get_field_id('arrow_color')}' 
                    name='{$this->get_field_name('arrow_color')}'
                    class='slicky-carousel-color-picker'
                    value='{$instance['arrow_color']}'
                    type='text'
                />
            </p>
            <p>
                <label for='{$this->get_field_id('responsive')}'>
                    <input 
                        id='{$this->get_field_id('responsive')}'
                        name='{$this->get_field_name('responsive')}'
                        class='slicky-carousel-widget-responsive'
                        type='checkbox'
                        $responsive_checked
                    />
                Shrink images on smaller screens</label>
            </p>
            <p $breakpoint_display>
                <label for='{$this->get_field_id('breakpoint')}'>Image will shrink on screens smaller than </label>
                <select $breakpoint_disabled id='{$this->get_field_id('breakpoint')}' name='{$this->get_field_name('breakpoint')}'>
                    $breakpoint_opts
                </select>
            </p>
        ";
    }
    
    public function update($new_instance, $old_instance){
        $sanitized_instance = array('errors' => array());
        
        $valid_width = preg_match("/^\d+(px|%)$/", $new_instance['container_width']);
        $valid_color = preg_match("/^#[0-9a-fA-F]{6}$/", $new_instance['arrow_color']);
        $valid_breakpoint = isset($new_instance['breakpoint']) && in_array($new_instance['breakpoint'], $this->breakpoints);

        $this->validate_widget_selection($valid_width, $new_instance, $old_instance, $sanitized_instance, 'container_width', 'Invalid width entered');
        $this->validate_widget_selection($valid_color, $new_instance, $old_instance, $sanitized_instance, 'arrow_color', 'Invalid arrow color entered');
        $this->validate_widget_selection($valid_breakpoint, $new_instance, $old_instance, $sanitized_instance, 'breakpoint', 'Invalid breakpoint selected', false);
        
        $sanitized_instance['responsive'] = $new_instance['responsive'];

        error_log('final: '. var_export($sanitized_instance, true));


        return $sanitized_instance;
    }

    private function validate_widget_selection($is_valid, $new_array, $old_array, &$dest_array, $index, $error_msg, $required = true ){
        error_log($index);
        if($is_valid){
            error_log('is valid');
            $dest_array[$index] = $new_array[$index];
        } else {
            if($required){
                $dest_array[$index] = $old_array[$index];
                $dest_array['errors'][] = $error_msg;
            } else {
                $dest_array[$index] = null;
            }
        }

    }

    public function widget($args, $instance){
        //per-instance settings: 
        //width
        //arrow_color
        //size (large or small)
        wp_enqueue_style('slick-css');
        wp_enqueue_style('slick-css-theme');
        wp_enqueue_style('carousel-display-css');

        wp_enqueue_script('slick-js');
        wp_enqueue_script('carousel-render-js');

        //change color based on selection
        $inline_slick_css = <<< EOT
            .slick-prev:before, .slick-next:before{
                color: {$instance['arrow_color']} !important;     
            }
EOT;
        if($instance['breakpoint'] == 'all screens') $instance['breakpoint'] = '9999px';
        $inline_custom_css = <<< EOT
            @media screen and (max-width: {$instance['breakpoint']}){
                #slicky_carousel_wrapper_{$this->number} > div, .slicky-carousel-wrapper img{
                    width: 175px;
                }
            }
EOT;

        wp_add_inline_style('slick-css-theme',$inline_slick_css);
        wp_add_inline_style('carousel-display-css',$inline_custom_css);

        echo $args['before_widget']; 

        $elements = get_option($this->option_prefix.'elements');
        
        echo '<div style="display:none;width:'.$instance['container_width'].';margin:auto;" class="slicky-carousel-wrapper" id="slicky_carousel_wrapper_'.$this->number.'">';

        foreach($elements as $element){
            $image_src = wp_get_attachment_image_src($element['img_id'], 'slicky-carousel-display');
            $href = $element['dest_id'] == -1 ? "#" : get_post_permalink($element['dest_id']);
            require $this->dir_path.'templates/slicky-element.php';
        }

        echo '</div>';

        echo $args['after_widget']; 
    }
}

?>
