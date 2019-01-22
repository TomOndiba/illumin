<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );


function wpr_remove_custom_actions() {
	remove_action( 'avada_header', 'avada_header_1', 20 );
}
add_action('init','wpr_remove_custom_actions');
	remove_action( 'avada_header',  'avada_header_1', 20  );


if ( ! function_exists( 'mycustomHeader' ) ) {

	function mycustomHeader() {

		$left_logo_image	=	get_field('left_logo_image','option');
		$left_logo_text	  =	get_field('left_logo_text','option');
		$left_logo_link		=	get_field('left_logo_link','option');
		$right_logo_image	=	get_field('right_logo_image','option');
		$right_logo_link	=	get_field('right_logo_link','option');
    if($left_logo_image=="") {
      $left_logo = $left_logo_text;
    } else {
      $left_logo = wp_get_attachment_image($left_logo_image,'full',"");
    }
		?>
		<div class="fusion-header-sticky-height"></div>
			<div class="fusion-header">
				<div class="fusion-row">
					<div class="top-logo-area clearfix">
            <div class="fusion-column col-lg-3 col-md-3 col-sm-6 col-xs-6">
							<a href="<?php echo $left_logo_link; ?>" target="_blank"><?php echo $left_logo; ?></a>
						</div>
						<div class="fusion-column col-lg-3 col-md-3 col-sm-6 col-xs-6 pull-right text-right">
							<a href="<?php echo $right_logo_link; ?>" target="_blank"><?php echo wp_get_attachment_image($right_logo_image,'full',""); ?></a>
						</div>
					</div>
					<div class="fusion-logo customLogo" data-margin-top="<?php echo intval( Avada()->settings->get( 'margin_logo_top' ) ); ?>px" data-margin-bottom="<?php echo intval( Avada()->settings->get( 'margin_logo_bottom' ) ); ?>px" data-margin-left="<?php echo intval( Avada()->settings->get( 'margin_logo_left' ) ); ?>px" data-margin-right="<?php echo intval( Avada()->settings->get( 'margin_logo_right' ) ); ?>px">
						 <a href="<?php bloginfo('url') ?>" title=""><?php echo str_replace("[br]","<br>",get_bloginfo('description'));    ?></a>
					</div>
					<?php echo avada_main_menu(); ?>
				</div>
			</div>
		<?php
	}
add_action( 'avada_header', 'mycustomHeader', 20 );
}
// add_action( 'wp_enqueue_scripts', 'prefix_rev_my_stylesheet' );

// function prefix_rev_my_stylesheet() {
	// wp_enqueue_script( 'custom-js',get_bloginfo('stylesheet_directory').'/siteQuery.js', array( 'jquery' ),'1.0',true);
// }


if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
        'title' => 'Website Options'
    ));
}
