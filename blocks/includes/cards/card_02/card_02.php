<?php
$card = get_field('card', get_the_ID());
$title = ! empty( $card['title'] ) ? $card['title'] : get_the_title();
$button_text = ! empty( $card['button_text'] ) ? $card['button_text'] : 'Saiba mais';
?>
<article class="card-02 link-seo">
    <div class="top">
      <figure>
        <?php echo ! empty($card['icon']) ? wp_get_attachment_image($card['icon']) : ''; ?>
      </figure>
      
      <h2 class="title--20"><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h2>
    </div>

    <?php if (!empty($card['description'])): ?>
    <div class="text">
    <p><?php echo $card['description']; ?></p>
    </div>
    <?php endif; ?>

    <span class="call"><?php echo $button_text; ?></span>
</article>