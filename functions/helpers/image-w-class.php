<?php
    function image_size($image_id){
        if ($image_id) {
            // $img_id = get_post_thumbnail_id( $image_id );
            $img = wp_get_attachment_image_src( $image_id , 'medium_laarge');
            $img_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', TRUE);
            $img_width = $img[1];
            $img_height = $img[2];
    
            if($img_width > $img_height){
                $img_class = "full-height";
            }else{
                $img_class = "full-width";
            }
    
            get_the_post_thumbnail();
            echo '<img class="'.$img_class.'" src="'. $img[0] .'" alt="'.$img_alt.'" >';
        }
        else{
            echo '<div class="no-image"></div>';
        }   
    }
?>