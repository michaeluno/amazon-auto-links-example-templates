<?php
/**
 *	Plugin Name:    Amazon Auto Links - Example Templates
 *	Plugin URI:     http://en.michaeluno.jp/amazon-auto-links
 *	Description:    Example Amazon Auto Links templates.
 *	Author:         Michael Uno (miunosoft)
 *	Author URI:     http://michaeluno.jp
 *	Version:        1.0.0
 */

class AmazonAutoLinks_ExampleTemplates_Registry {
    static public $sFilePath = '';
    static public $sDirPath = '';
    static public function setUp( $sPluginFilePath ) {
        self::$sFilePath = $sPluginFilePath;
        self::$sDirPath  = dirname( self::$sFilePath );
    }
    public static function getPluginURL( $sPath='', $bAbsolute=false ) {
        $_sRelativePath = $bAbsolute
            ? str_replace('\\', '/', str_replace( self::$sDirPath, '', $sPath ) )
            : $sPath;
        if ( isset( self::$_sPluginURLCache ) ) {
            return self::$_sPluginURLCache . $_sRelativePath;
        }
        self::$_sPluginURLCache = trailingslashit( plugins_url( '', self::$sFilePath ) );
        return self::$_sPluginURLCache . $_sRelativePath;
    }
        /*
         */
        static private $_sPluginURLCache;    
}
AmazonAutoLinks_ExampleTemplates_Registry::setUp( __FILE__ );

class AmazonAutoLinks_ExampleTemplates_Register {
    
    public $sTemplateContainerDirPath = array();
    
    public function __construct( $sTemplateContainerDirPath ) {
        $this->sTemplateContainerDirPath = $sTemplateContainerDirPath;
        add_filter(
            'aal_filter_template_container_directories',
            array( $this, 'replyToAddTemplateContainerDirectory' )
        );
    }
        /**
         * Add the template directory to the passed array.
         * @param   array   $aDirPaths
         * @callback    filter      aal_filter_template_directories
         * @return      array
         */
        public function replyToAddTemplateContainerDirectory( $aDirPaths ) {
            $aDirPaths[] = $this->sTemplateContainerDirPath;
            return $aDirPaths;
        }            
    
}

new AmazonAutoLinks_ExampleTemplates_Register( dirname( __FILE__ ) . '/template' );
