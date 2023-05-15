<?php
$contact_01 = get_field('contact_01');
$form = sprintf( "%02d", $contact_01['form']['form_number'] );
?>
<section class="contact-01 <?php echo (!empty($contact_01['class']) ? $contact_01['class'] : ''); ?>">
  <?php if (!empty($contact_01['background'])): ?>
  <figure class="cover">
     <?php echo wp_get_attachment_image($contact_01['background'], 'full', false, []); ?>
  </figure>
  <?php endif; ?>

  <div class="container">
    <div class="left">
      <?php if (!empty($contact_01['title'])): ?>
      <h2 class="title--30"><?php echo $contact_01['title']; ?></h2>
      <?php endif; ?>

      <?php if (!empty($contact_01['description'])): ?>
      <div class="text">
        <?php echo $contact_01['description']; ?>
      </div>
      <?php endif; ?>
    </div>
   
    <?php 
    if (!empty($contact_01['form'])):
    get_template_part('blocks/includes/forms/form_' . $form . '/form_' . $form, null, $args = [
      'title' => $contact_01['form']['title'],
      'subtitle' => $contact_01['form']['subtitle']
    ]); 
    endif;
    ?>
  </div>
</section>
