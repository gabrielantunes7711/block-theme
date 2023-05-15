<style>
    @media screen and (min-width: 1281px) {
        <?= $args['class']?>{
            background-image: url(<?= wp_get_attachment_image_url( $args['background_id'], "full" ) ?>);
        }
    }

    @media screen and (max-width: 1280px) and (min-width: 768px) {
        <?= $args['class']?>{
            background-image: url(<?= wp_get_attachment_image_url( $args['background_id'], "background-notebook" ) ?>);
        }
    }

    @media screen and (max-width: 767px) and (min-width: 550px) {
        <?= $args['class']?>{
            background-image: url(<?= wp_get_attachment_image_url( $args['background_id'], "background-tablet" ) ?>);
        }
    }
    @media screen and (max-width: 549px){
        <?= $args['class']?>{
            background-image: url(<?= wp_get_attachment_image_url( $args['background_id'], "background-mobile" ) ?>);
        }
    }
</style>