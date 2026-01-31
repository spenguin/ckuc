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

    $subtitle   = wp_kses( $_POST['subtitle'], 'strip' );
    update_post_meta($post->ID, 'subtitle', $subtitle);
}

function productSpecifications()
{
    global $post;

    $pageCount  = get_post_meta($post->ID, 'pageCount', TRUE );
    $pageColour = get_post_meta($post->ID, 'pageColour', TRUE );
    $dimensions = unserialize(get_post_meta($post->ID, 'dimensions', TRUE )); 
    $dimensions = $dimensions ? $dimensions : [NULL,NULL];
    $dimensionsSystem   = get_post_meta($post->ID, 'dimensionsSystem', TRUE);
    $weight     = get_post_meta($post->ID, 'weight', TRUE );
    $weightSystem   = get_post_meta($post->ID, 'weightSystem', TRUE );
    $binding    = get_post_meta($post->ID, 'binding', TRUE );
    ?>

    <label for="pageCount">Page Count:</label>
    <input type="number" name="pageCount" value="<?php echo $pageCount; ?>" size="3"/><br><br>

    <label for="pageColour">Page Colour:</label><br>
    <input type="radio" name="pageColour" value="0" <?php echo $pageColour == 0 ? 'checked="checked"' : ''; ?> >Black & White<br>    
    <input type="radio" name="pageColour" value="1" <?php echo $pageColour == 1 ? 'checked="checked"' : ''; ?>>Colour<br>    
    <input type="radio" name="pageColour" value="2" <?php echo $pageColour == 2 ? 'checked="checked"' : ''; ?>>Black & White/Colour<br><br>   

    <label>Dimensions:</label><br>
    <label for="dimensions">Width:</label><input type="text" name="dimensions[]" value="<?php echo $dimensions[0]; ?>" size="3" />
    <label for="dimensions">Height:</label><input type="text" name="dimensions[]" value="<?php echo $dimensions[1]; ?>" size="3" />
    <input type="radio" name="dimensionsSystem" value=0 <?php echo $dimensionsSystem == 0 ? 'checked="checked"' : ''; ?> />in<input type="radio" name="dimensionsSystem" value=1 <?php echo $dimensionsSystem == 1 ? 'checked="checked"' : ''; ?> />cm<br><br>


    <label for="weight">Weight:</label>
    <input type="number" name="weight" value="<?php echo $weight; ?>" size="1"/>
    <input type="radio" name="weightSystem" value=0 <?php echo $weightSystem == 0 ? 'checked="checked"' : ''; ?> />lbs<input type="radio" name="weightSystem" value=1 <?php echo $weightSystem == 1 ? 'checked="checked"' : ''; ?> />kgs<br><br>

    <label for="binding">Binding:</label>
    <input type="text" name="binding" value="<?php echo $binding; ?>" /><br>

    <?php
}

function saveProductSpecifications()
{
    global $post;

    if( empty($post->ID) ) return;

    $pageCount   = wp_kses( $_POST['pageCount'], 'strip' );
    update_post_meta($post->ID, 'pageCount', $pageCount);

    $pageColour   = wp_kses( $_POST['pageColour'], 'strip' );
    update_post_meta($post->ID, 'pageColour', $pageColour); 
    
    $dimensions   = serialize(array_map( 'esc_attr', $_POST['dimensions'] )); 
    update_post_meta($post->ID, 'dimensions', $dimensions);   
    
    $dimensionsSystem   = wp_kses( $_POST['dimensionsSystem'], 'strip' );
    update_post_meta($post->ID, 'dimensionsSystem', $dimensionsSystem);  
    
    $weight   = wp_kses( $_POST['weight'], 'strip' );
    update_post_meta($post->ID, 'weight', $weight); 
    
    $weightSystem   = wp_kses( $_POST['weightSystem'], 'strip' );
    update_post_meta($post->ID, 'weightSystem', $weightSystem);    

    $binding   = wp_kses( $_POST['binding'], 'strip' );
    update_post_meta($post->ID, 'binding', $binding);    
}


function PDFLink()
{
    global $post;

    $PDFLink   = get_post_meta($post->ID, 'PDFLink', TRUE);

    ?>
    <label for="PDFLink">PDF Link:</label>
    <input type="text" name="PDFLink" value="<?php echo $PDFLink; ?>" size="40" /> (Note: Link will be masked)

    <?php    
}

function savePDFLink()
{
    global $post;

    if( empty($post->ID) ) return;

    $PDFLink   = wp_kses( $_POST['PDFLink'], 'strip' );
    update_post_meta($post->ID, 'PDFLink', $PDFLink);
}

