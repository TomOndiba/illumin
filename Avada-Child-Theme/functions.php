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
            <div class="fusion-column viterbi-logo col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<a href="http://viterbischool.usc.edu" target="_blank"><img id="viterbi-logo-img" src="/wp-content/themes/Avada-Child-Theme/assets/img/Formal_Viterbi_GoldOnBlack.png"/></a>
						</div>
            <div class="fusion-column col-lg-4 col-sm-4">

            </div>
            <div class="fusion-column col-lg-4 col-md-4 col-sm-4 col-xs-6 pull-right text-right usc-logo">
              <?php $image_attribute = wp_get_attachment_image_url($right_logo_image,'full');?>
              <a href="<?php echo $right_logo_link; ?>" target="_blank"><img id="usc-logo" src=<?php echo $image_attribute; ?> /></a>
            </div>

					</div>
          <img id="illumin-logo-small" src="https://viterbiillumin.wpengine.com/wp-content/themes/Avada-Child-Theme/assets/img/illumin_black.png"/>
          <form id="header-search" role="search" class="searchform col-md-3 col-xs-6 col-md-push-9" method="get" action="<?php echo esc_url_raw( home_url( '/' ) ); ?>">
            <div class="search-table">
              <div class="search-field">
                <input type="text" value="" name="s" class="s" placeholder="<?php esc_html_e( 'Search ...', 'Avada' ); ?>" required aria-required="true" aria-label="<?php esc_html_e( 'Search ...', 'Avada' ); ?>"/>
              </div>
              <div class="search-button">
                <input type="submit" class="searchsubmit" value="&#xf002;" />
              </div>
            </div>
          </form>
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
