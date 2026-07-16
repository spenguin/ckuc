<?php
/**
 * Render Publisher Application form
 */

add_shortcode( 'publisherApplication', '\publisherApplication' );

function publisherApplication( $atts = [], $content = null, $tag = '' )
{ 
    
    $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if( isset($_POST['submit']))
    {
        $username   = $email = $_POST['email'];

        if ( ! username_exists( $username ) && ! email_exists( $email ) ) 
        {
        
            $user_data  = [
                'user_login'    => $username,
                'user_pass'     => wp_generate_password( 12, TRUE, FALSE ),
                'user_email'    => $email,
                'user_url'      => $_POST['shop'],
                'role'          => 'publisher',
                'display_name'  => $_POST['user_name']
            ];

            $user_id = wp_insert_user( $user_data );
            

            if ( ! is_wp_error( $user_id ) ) 
            {
                error_log( 'User created successfully. ID: ' . $user_id );
                echo '<p>Your application has been accepted.</p>';
                $message    = [];
                foreach( $_POST as $key => $value )
                {
                    $message[]  = $key . ': ' . $value;
                }
                $subject    = "New Publisher";
                $to         = "info@weirdspace.com";
                $body       = join("<br>", $message );
                $headers    = array('Content-Type: text/html; charset=UTF-8');

                wp_mail( $to, $subject, $body, $headers );

            } else {
                error_log( 'Error creating user: ' . $user_id->get_error_message() );
                echo '<p>There was an error in submitting your application. Please try again. If the issue persists, please contact administration.</p>';
            }
        }        
    }

    ?>
        <form method="post" action="<?php echo $actual_link; ?>">
            <div><label for="name">Your Name: </label>
            <input type="text" name="user_name" required/></div>

            <div><label for="publisher">Your Publishing Company Name: </label>
            <input type="text" name="publisher" required /></div> 
            
            <div><label for="name">Your Email Address: </label>
            <input type="email" name="email" required /></div>
            
            <div><label for="name">Your Online Shop URL: </label>
            <input type="text" name="shop" required/></div>

            <div><label for="name">Your Instagram Handle: </label>
            <input type="text" name="instagram" /></div>


            <input type="submit" class="btn btn-submit" name="submit" value="Apply" />
        </form>


    <?php
}