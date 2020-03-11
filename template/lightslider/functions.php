<?php
class AmazonAutoLinks_ExampleTemplates_LightSlider_ResourceLoader {
    
    private $___aSliderOptions = array(
        'test' => 'this is a test',
        'loop'  => true,
        'slideMove' => 4,
        'easing' => 'cubic-bezier(0.25, 0, 0.25, 1)',
        'speed' => 600,
        'pause' => 4000,
        'auto' => true,
        'item' => 1,
        'pauseOnHover' => true,
        'adaptiveHeight' => false,
    );
    
    public function __construct() {
        
        add_action( 'wp_enqueue_scripts', array( $this, 'replyToLoadJavaScript' ) );
        add_action( 'enqueue_embed_scripts', array( $this, 'replyToLoadJavaScript' ) );

    }

    /**
     * Enqueues styles and scripts.
     * @callback        action      wp_enqueue_scripts
     */
    public function replyToLoadJavaScript() {

        $_sDirName = str_replace(
            AmazonAutoLinks_ExampleTemplates_Registry::$sDirPath, // search
            '', // replace
            dirname( __FILE__ ) // subject
        );
        $_sDirName   = trim( wp_normalize_path( $_sDirName ), '/' );
        $_iDebugMode = ( integer ) ( defined( 'WP_DEBUG' ) && WP_DEBUG );
        $_aFiles     = array(
            0 => $_sDirName . '/asset/lightslider/css/lightslider.min.css',
            1 => $_sDirName . '/asset/lightslider/css/lightslider.css',
        );
        $_sPath      = $_aFiles[ $_iDebugMode ];
        wp_enqueue_style( 
            'lightslider-css',     // handle id
            AmazonAutoLinks_ExampleTemplates_Registry::getPluginURL( $_sPath ) // file url
        );
        
        $_aFiles     = array(
            0 => $_sDirName . '/asset/lightslider/js/lightslider.min.js',
            1 => $_sDirName . '/asset/lightslider/js/lightslider.js',
        );
        $_sPath       = $_aFiles[ $_iDebugMode ];      
        wp_enqueue_script( 
            'lightslider',     // handle id
            AmazonAutoLinks_ExampleTemplates_Registry::getPluginURL( $_sPath ),  // file url
            array( 'jquery' ),   // dependencies
            '',     // version
            true    // in footer? yes
        );        
        
        $_aFiles     = array(
            0 => $_sDirName . '/asset/js/lightslider-enabler.js',
            1 => $_sDirName . '/asset/js/lightslider-enabler.js',
        );
        $_sPath       = $_aFiles[ $_iDebugMode ];          
        wp_enqueue_script( 
            'lightslider_enabler',     // handle id
            AmazonAutoLinks_ExampleTemplates_Registry::getPluginURL( $_sPath ), // script url
            array( 'lightslider' ),   // dependencies
            '',     // version
            true    // in footer? yes
        );
        wp_localize_script( 
            'lightslider_enabler',  // handle id - the above used enqueue handle id
            'lightslider_enabler',  // name of the data loaded in the script
            $this->___aSliderOptions // translation array
        );                 
        
        
    }    
    
}
new AmazonAutoLinks_ExampleTemplates_LightSlider_ResourceLoader;


class AmazonAutoLinks_ExampleTemplates_LightSlider_OutputFormats {

    public function __construct() {
        $_oTemplateOption = AmazonAutoLinks_TemplateOption::getInstance();
        $_sTemplateID     = $_oTemplateOption->getTemplateID( dirname( __FILE__ ) );
        add_filter( 'aal_filter_template_default_item_format_' . $_sTemplateID, array( $this, 'replyToGetDefaultItemFormat' ) );
    }

    public function replyToGetDefaultItemFormat( $sItemFormat ) {
        return '<div class="amazon-auto-links-product">' . PHP_EOL
            . '    <div class="amazon-auto-links-product-image" style="min-width: %image_size%px;">' . PHP_EOL
            . '        %image%' . PHP_EOL
            . '    </div>' . PHP_EOL
            . '    <div class="amazon-auto-links-product-body">' . PHP_EOL
            . '        %title%' . PHP_EOL
            . '    </div>' . PHP_EOL
            . '</div>';
    }

}
new AmazonAutoLinks_ExampleTemplates_LightSlider_OutputFormats;