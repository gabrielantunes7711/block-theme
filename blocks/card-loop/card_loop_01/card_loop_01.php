<?php
$card_loop_01 = get_field( "card_loop_01" );
$card = sprintf( "%02d", $card_loop_01['card'] );
?>

<?php
$args = [
  'post_type' => $card_loop_01['post_type'],
  'posts_per_page' => -1,
];

$the_query = new WP_Query( $args );

if ($the_query->have_posts()):
?>

<section class="card-loop-01 <?php echo ( !empty( $component['class'] ) ? $component['class'] : '' ); ?>">
  <div class="container">
    <?php if ( !empty( $card_loop_01['title'] ) ): ?>
    <h2 class="title--40"><?php echo $card_loop_01['title']; ?></h2>
    <?php endif; ?>

    <?php if (!empty($card_loop_01['description'])): ?>
    <div class="text">
      <?php echo $card_loop_01['description']; ?>
    </div>
    <?php endif; ?>

    <div class="card-loop-01-slider" data-carousel="card-loop-01-slider">
      <?php
      while ($the_query->have_posts()) :
        $the_query->the_post();
        get_template_part("blocks/includes/cards/card_{$card}/card_{$card}");
      endwhile; wp_reset_postdata()?>
    </div>
  </div>
</section>
<?php endif; ?>