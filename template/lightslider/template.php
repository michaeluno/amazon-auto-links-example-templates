<?php
/*
 * Available variables:
 * 
 * $aOptions   - the plugin options
 * $aProducts  - the fetched product links
 * $aArguments - the user defined arguments such as image size and count etc.
 */

$_aStructure_Product = array(
    'product_url'       => '',
    'title'             => '',
    'text_description'  => '',
    'description'       => '',
    'image_size'        => '',
    'product_url'       => '',
    'thumbnail_url'     => '',    
);
  
$sClassAttributes_ProductsContainer = 'amazon-products-lightslider-container' . ' amazon-unit-' . $aArguments[ 'id' ];
$sClassAttributes_ProductsContainer .= empty( $aArguments[ '_labels' ] ) 
    ? '' 
    : ' amazon-label-' . implode( ' amazon-label-', $aArguments[ '_labels' ] );

$_sWidth  = AmazonAutoLinks_PluginUtility::getDegree( 'width', $aArguments );
$_sWidth  = $_sWidth
    ? "width: {$_sWidth};"
    : '';
$_sHeight = AmazonAutoLinks_PluginUtility::getDegree( 'height', $aArguments );
$_sHeight = $_sHeight
    ? "height: {$_sHeight};"
    : '';
$_sInlineStyle = $_sWidth . $_sHeight;


$_sSliderElementInlineCSS = 'max-width: ' . ( ( integer ) $aArguments[ 'image_size' ] + 20 ) . 'px;'; 
$_sSliderElementInlineCSS = ''; 

?>
<?php if ( empty( $aProducts ) ) : ?>
    <div><p><?php _e( 'No products found.', 'amazon-auto-links' ); ?></p></div>  
    <?php return true; ?>
<?php endif; ?>    

<?php if ( isset( $aProducts['Error']['Message'], $aProducts['Error']['Code'] ) ) : ?>    
    <div class="error">
        <p>
            <?php echo $aProducts['Error']['Code'] . ': '. $aProducts['Error']['Message']; ?>
        </p>
    </div>
<?php return true; ?>
<?php endif; ?>
    
<div class="<?php echo $sClassAttributes_ProductsContainer; ?>" style="<?php echo $_sInlineStyle; ?>">
    <ul class="amazon-products-lightslider">
    <?php foreach( $aProducts as $_aProduct ) : ?>
        <?php $_aProduct = $_aProduct + $_aStructure_Product; ?>
        <li class="amazon-product-lightslider-element" style="<?php echo $_sSliderElementInlineCSS; ?>">
            <div class="amazon-product-container">
            <?php echo $_aProduct[ 'formatted_item' ]; ?>
            </div>
        </li>
    <?php endforeach; ?>    
    </ul>
</div>
