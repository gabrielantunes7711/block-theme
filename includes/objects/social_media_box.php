<?php $social_media = get_field('social_midia', 'option'); ?>
<?php if ($social_media) : ?>
    <div class="social-media-box <?php echo $args["class"]; ?>">
        <?php if($social_media["link_facebook"]): ?>

        <a class="medialink -facebook" target=”_blank” rel=”noopener” href="<?= $social_media["link_facebook"]; ?>" title="Facebook">Facebook</a>

        <?php endif; ?>
        
        <?php if($social_media["link_instagram"]): ?>

        <a class="medialink -instagram" target=”_blank” rel=”noopener” href="<?= $social_media["link_instagram"]; ?>" title="instagram">instagram</a>

        <?php endif; ?>

        <?php if($social_media["link_twitter"]): ?>

        <a class="medialink -twitter" target=”_blank” rel=”noopener” href="<?= $social_media["link_twitter"]; ?>" title="twitter">twitter</a>

        <?php endif; ?>

        <?php if($social_media["link_linkedin"]): ?>

        <a class="medialink -linkedin" target=”_blank” rel=”noopener” href="<?= $social_media["link_linkedin"]; ?>" title="linkedin">linkedin</a>

        <?php endif; ?>

        <?php if($social_media["link_youtube"]): ?>

        <a class="medialink -youtube" target=”_blank” rel=”noopener” href="<?= $social_media["link_youtube"]; ?>" title="youtube">youtube</a>

        <?php endif; ?>
    </div>
<?php endif; ?>
