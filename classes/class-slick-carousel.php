<?php

//class SlickCarousel extends WP_Widget{
class SlickCarousel{

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
        //slide??
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

    private $number_of_inputs = array(
        'title' => 'Number of images',
        'label_for' => '',
        'option_name' => 'numofinputs',
        'default_value' => 1,
        'description' => '',
        'type' => 'hidden',
    );

    private $tabs = array(
        'cf' => 'Image Configuration',
        'lg' => 'Full Screen / Large',
        'md' => 'Medium Size',
        'sm' => 'Small Size',
        'xs' => 'Extra Small / Mobile',
    );

    private $option_prefix = "slick-carousel-";
    private $admin_page_slug = 'slick-carousel';
    private $dir_path;
    private $dir_url;

    public function __construct($dir_path, $dir_url){
        $this->dir_path = $dir_path;
        $this->dir_url = $dir_url;
    }

    public function init(){
        add_action('admin_menu', array($this, 'add_admin_page'));
        add_action('admin_init', array($this, 'configure_options'));
        add_action('admin_enqueue_scripts', array($this, 'register_scripts'));
        add_action('after_setup_theme', array($this, 'register_image_sizes'));
        add_action('wp_ajax_slick_carousel_add_image', array($this, 'add_image'));
    }

    public function register_scripts(){
        wp_register_script('carousel-admin-js', $this->dir_url.'js/carousel-admin.js', array('jquery'), false, true); 
        $num_of_inputs = get_option($this->option_prefix.'numofinputs-cf',0);
        wp_localize_script('carousel-admin-js', 'slickCarousel', 
            array(
                'numOfInputs' => $num_of_inputs,
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'action' => 'slick_carousel_add_image'
            )
        );
    }

    public function add_admin_page(){
        add_theme_page('Carousel Options', 'Carousel Options', 'edit_theme_options', $this->admin_page_slug, array($this,'slick_carousel_admin_content'));
    }

    public function register_image_sizes(){
        add_image_size('slick-carousel-display', 350, 600);
        add_image_size('slick-carousel-admin-preview', 175, 300);
    }

    public function slick_carousel_admin_content(){
        if(!current_user_can('edit_theme_options')){
            wp_die(__('You do not have permission to access this page', 'sewchic'));
        }
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'cf';

        echo '<h1>Carousel Customization Options</h1>' ;
        echo '<h2 class="nav-tab-wrapper">';
        
        $responsive_enabled = get_option($this->option_prefix.$this->responsive_option['option_name'].'-cf');
        foreach($this->tabs as $key => $title){
            if(!$responsive_enabled && !in_array($key, array('cf', 'lg'), true)){
                continue;
            } 
            $class = 'nav-tab';
            $class .= ($active_tab == $key) ? ' nav-tab-active' : '';
            echo "<a href='?page={$this->admin_page_slug}&tab=$key' class='$class'>$title</a>";
        }
        echo '</h2>';

        echo '<form action="options.php" method="POST">';
            settings_fields($this->option_prefix.'tab-'.$active_tab);
            submit_button();
            do_settings_sections($this->option_prefix.'tab-'.$active_tab);
            submit_button();
        echo '</form>';
    }

    public function configure_options(){
        //the settings section for enabling the other tabs for responsive design settings
        add_settings_section(
            $this->option_prefix.'section-responsive',
            $this->responsive_option['title'],
            function(){},
            $this->option_prefix.'tab-cf'
        ); 

        add_settings_field(
            $this->option_prefix.$this->responsive_option['option_name'].'-cf',
            $this->responsive_option['title'],
            array($this, 'generic_input_callback'),
            $this->option_prefix.'tab-cf',
            $this->option_prefix.'section-responsive',
            $this->responsive_option
        );

        //register the only setting in the group
        register_setting(
            $this->option_prefix.'tab-cf',
            $this->option_prefix.$this->responsive_option['option_name'].'-cf'
        );


        //#region - the settings section for uploading images
        //TODO: see if i can update the value of numofinputs-cf via ajax in order to properly field and set the other options
        //TODO: research register_setting to see what it does. if can't use it directly, will likely need to emulate its behavior
        add_settings_section(
            $this->option_prefix.'section-images',
            'Image upload and configuration',
            array($this, 'output_section_images_configs_for_admin'),
            $this->option_prefix.'tab-cf'
        );

        //add the hidden "quantity of images" option
        register_setting(
            $this->option_prefix.'section-images',
            $this->option_prefix.'numofinputs-cf'
        );

        ////register the settings for as many as num of inputs allows
        //$num_of_inputs = get_option($this->option_prefix.'numofinputs-cf', 0);
        //for($i = 1; $i <= $num_of_inputs; $i++){
        //    register_setting(
        //        $this->option_prefix.'section-images',
        //        $this->option_prefix."image-$i"
        //    );
        //}
        //#endregion
    }

    public function output_section_images_configs_for_admin(){
        wp_enqueue_media();
        wp_enqueue_script('carousel-admin-js');
        $prefix = $this->option_prefix;
        $num_of_inputs = get_option($this->option_prefix.'numofinputs-cf', 0);
        $ids = get_option($this->option_prefix.'images',array()); //this array stores attachment ids of the images selected for the carousel
        $images = array();
        foreach($ids as $id){
            $images[] = array(
                'id' => $id,
                'src' => wp_get_attachment_image_src($id, 'slick-carousel-admin-preview')
            );
        }

        require_once $this->dir_path.'/templates/admin-config.php';
    }

    public function add_image(){
        error_log('got to ajax function');
        $num_of_inputs = $_POST['numOfInputs'];
        update_option($this->option_prefix.'numofinputs-cf', $num_of_inputs);
        
        $images = get_option($this->option_prefix.'images', array());
        $images[] = $_POST['attachmentId'];
        update_option($this->option_prefix.'images', $images);
        
        $result = array('result' => 'ok');
        error_log('returning this to javascript '. json_encode($result));
        echo json_encode($result);
        
        wp_die();
    }

    public function generic_input_callback($args){
        if(!isset($args['suffix'])) $args['suffix'] = 'cf';
        extract($args);
        $option = get_option("{$this->option_prefix}$option_name-$suffix");
        var_dump($option);
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


}


?>
