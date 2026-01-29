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