<?php
$hero_01 = get_field( 'hero_01' );
$class = get_field( 'hero_01_class' );
if ( !empty( $hero_01 ) ) :
?>
<section class="hero-01 <?php echo ( !empty( $class ) ? $class : '' ); ?>" data-carousel="hero-01">
  <?php foreach( $hero_01 as $banner ) : ?>
  <div class="hero-01__banner">
    <?php if ( !empty( $banner['background'] ) ): ?>
    <figure class="figure-bg">
       <?php echo wp_get_attachment_image( $banner['background'], 'full' ); ?>
    </figure>
    <?php endif; ?>
  
    <div class="container">
      <div class="content">
        <?php if ( !empty( $banner['title'] ) ): ?>
        <h2 class="title--50"><?php echo $banner['title']; ?></h2>
        <?php endif; ?>

        <?php if ( !empty( $banner['subtitle'] ) ): ?>
        <div class="text">
          <?php echo $banner['subtitle']; ?>
        </div>
        <?php endif; ?>

        <?php if ( !empty( $banner['list'] ) ) : ?>
        <div class="hero-list">
          <?php foreach( $banner['list'] as $item ) : ?>
          <div class="list-item">
            <?php if ( !empty( $item['icon'] ) ): ?>
            <div class="linear-border">
               <?php echo wp_get_attachment_image( $item['icon'], 'full' ); ?>
            </div>
            <?php endif; ?>

            <?php if ( !empty( $item['description'] ) ): ?>
            <span><?php echo $item['description']; ?></span>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ( !empty( $banner['link'] ) ): ?>
        <a href="<?php echo $banner['link']['url']; ?>" target="<?php echo $banner['link']['target']; ?>" class="btn--primary" title="<?php echo $banner['link']['title']; ?>"><?php echo $banner['link']['title']; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</section>
<?php endif; ?>
