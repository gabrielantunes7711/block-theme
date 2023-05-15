<?php
add_action( 'wp_head', 'wpdd_google_fonts' );

function wpdd_google_fonts() {
	$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap';
	
	?>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

	<link rel="preload" as="style" href="<?php echo $google_fonts_url; ?>" />

	<link rel="stylesheet" href="<?php echo $google_fonts_url; ?>" media="print" onload="this.media='all'" />

	<noscript>
		<link rel="stylesheet" href="<?php echo $google_fonts_url; ?>" />
	</noscript>
<?php }