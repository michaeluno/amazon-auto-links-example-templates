<?php
/*
 * Available variables:
 * 
 * $aOptions   - the plugin options
 * $aProducts  - the fetched product links
 * $aArguments - the user defined arguments such as image size and count etc.
 */


$sClassAttributes_ProductsContainer = 'amazon-products-minimal-container' . ' amazon-unit-' . $aArguments[ 'id' ];
$sClassAttributes_ProductsContainer .= empty( $aArguments[ '_labels' ] ) ? '' : ' amazon-label-' . implode( ' amazon-label-', $aArguments[ 'labels' ] );
?>

<div class="<?php echo $sClassAttributes_ProductsContainer; ?>">
<?php foreach( $aProducts as $_aProduct ) : ?>
    <?php $_aProduct = $_aProduct + array( 'formatted_item' => '' ); ?>
    <div class="amazon-product-container">
        <?php echo $_aProduct[ 'formatted_item' ]; ?>
    </div>
<?php endforeach; ?>    
</div>
