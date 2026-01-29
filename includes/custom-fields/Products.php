<?php

namespace CustomFields;

function productSubtitle()
{
    global $post;

    $subtitle   = get_post_meta($post->ID, 'subtitle', TRUE);

    ?>
    <label for="subtitle">Subtitle:</label>
    <input type="text" name="subtitle" value="<?php echo $subtitle; ?>" size="40" />

    <?php
}

function saveProductSubtitle()
{
    global $post;

    if( empty($post->ID) ) return;

    $subtitle   = wp_kses( $_POST['subtitle'] );
    update_post_meta($post->ID, 'subtitle', $subtitle);

}

function productSpecifications()
{
    global $post;

    $pageCount  = get_post_meta($post->ID, 'pageCount', TRUE );
    $pageColour = get_post_meta($post->ID, 'pageColour', TRUE );
    $dimensions = get_post_meta($post->ID, 'dimensions' );
    if( count($dimensions) == 0 ) $dimensions = [NULL,NULL];
    $weight     = get_post_meta($post->ID, 'weight', TRUE );
    $weightSystem   = get_post_meta($post->ID, 'weightSystem', TRUE );
    $binding    = get_post_meta($post->ID, 'binding', TRUE );
    ?>

    <label for="pageCount">Page Count:</label>
    <input type="number" name="pageCount" value="<?php echo $pageCount; ?>" /><br>

    <label for="pageColour">Page Colour:</label><br>
    <input type="radio" name="pageColour" value="0" <?php echo $pageColour == 0 ? 'checked="checked"' : ''; ?> >Black & White<br>    
    <input type="radio" name="pageColour" value="1" <?php echo $pageColour == 1 ? 'checked="checked"' : ''; ?>>Colour<br>    
    <input type="radio" name="pageColour" value="2" <?php echo $pageColour == 2 ? 'checked="checked"' : ''; ?>>Black & White/Colour<br>   

    <label>Dimensions:</label><br>
    <label for="width">Width:</label><input type="text" name="dimensions[]" value="<?php echo $dimensions[0]; ?>" /><br>
    <label for="width">Height:</label><input type="text" name="dimensions[]" value="<?php echo $dimensions[1]; ?>" /><br>

    <label for="weight">Page Count:</label>
    <input type="number" name="weight" value="<?php echo $weight; ?>" />
    <label for="weightSystem">Weight System:</label><input type="radio" name="weightSystem" value=0 <?php echo $weightSystem == 0 ? 'checked="checked"' : ''; ?> />lbs<input type="radio" name="weightSystem" value=1 <?php echo $weightSystem == 1 ? 'checked="checked"' : ''; ?> />kgs<br>

    <label for="binding">Binding:</label>
    <input type="text" name="binding" value="<?php echo $binding; ?>" /><br>

    <?php
}

function saveProductSpecifications()
{

}