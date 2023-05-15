<?php
// Custom WordPress Login Logo
function my_login_logo() {
	$logo = get_field('logo_do_site' , 'option');
	echo "
	<style>
		body.login{
		// background: #fafafa;
		background: radial-gradient(circle, rgba(158,167,206,1) 0%, rgba(108,116,152,1) 20%, rgba(52,60,93,1) 70%, rgba(52,60,93,1) 100%);
		
		}

		body.login #login{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 0;
			background: #fff;
		}

		body.login div#login h1 a {
			background-image: url(".esc_url($logo['url']).");
			height: 80px;
			width: 100%;
			background-size: initial;
			box-sizing: border-box;
			margin: 15px auto;
		}

		body.login div#login form#loginform {
			margin-top: 20px;
			margin-left: 0;
			padding: 26px 24px 46px;
			background: #fff;
			-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);
			box-shadow: 0px 9px 30px 3px rgba(0, 0, 0, 0.15);
			border-radius: 5px;
		}

		body.login div#login form#loginform #wp-submit {
			background: #E9AE01;
			color: #141414;
			text-shadow: none;
			font-weight: 900;
			box-shadow: none;
			border: none;
		}
   </style>";
 
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );


//Link na tela de login para a página inicial 
function my_login_logo_url() {
    return  get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return "nome_cliente";
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );