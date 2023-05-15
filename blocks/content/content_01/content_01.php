<?php
$content_01 = get_field( 'content_01' );
$mask_id = sprintf( "%02d", $content_01['mask'] );
?>

<?php 
if (!empty($mask_id)):
include_once get_theme_file_path( "assets/images/masks/mask_" . $mask_id .".svg" ); 
endif;
?>
<section class="content-01 <?php echo (!empty($content_01['class']) ? $content_01['class'] : ''); ?>">
  <div class="container">
    <?php if (!empty($content_01['image'])): ?>
    <figure class="cover mask--<?php echo $mask_id; ?>">
       <?php echo wp_get_attachment_image($content_01['image'], 'full'); ?>
    </figure>
    <?php endif; ?>
    
    <div class="right">
      <?php if (!empty($content_01['title'])): ?>
      <h2 class="title--40"><?php echo $content_01['title']; ?></h2>
      <?php endif; ?>
     
      <?php if (!empty($content_01['content'])) : ?>
      <div class="text">
        <?php echo $content_01['content']; ?>
      </div>
      <?php endif; ?>

      <?php if (!empty($content_01['link'])): ?>
      <a href="<?php echo $content_01['link']['url']; ?>" target='<?php echo $content_01['link']['target']; ?>' class="btn--primary"><?php echo $content_01['link']['title']; ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>