<?php
  if(get_field('tags_apos_body_all', 'option')){
    the_field('tags_apos_body_all', 'option');
  }
?>


<?php
  if (is_page_template( 'mensagem-enviada.php' )) {
    if(get_field('tags_apos_body_thanks', 'option')){
      the_field('tags_apos_body_thanks', 'option');
    }
  }
?>
