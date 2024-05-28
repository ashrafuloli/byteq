<?php

/**
 * favicon logo
 */
function byteq_favicon() {
	$byteq_favicon     = get_template_directory_uri() . '/assets/img/logo/favicon.svg';
	$byteq_favicon_url = get_theme_mod( 'favicon_url', $byteq_favicon );
	?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $byteq_favicon_url ); ?>">
	<?php
}

add_action( 'wp_head', 'byteq_favicon' );

/**
 * header logo
 */
function byteq_header_logo() {
	?>
	<?php
	$byteq_logo_on    = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : null;
	$byteq_logo       = get_template_directory_uri() . '/assets/img/logo/logo.svg';
	$byteq_logo_white = get_template_directory_uri() . '/assets/img/logo/logo.svg';

	$byteq_customizer_logo = get_theme_mod( 'logo', $byteq_logo );
	$byteq_secondary_logo  = get_theme_mod( 'secondary_logo', $byteq_logo_white );

	$byteq_page_logo = function_exists( 'get_field' ) ? get_field( 'byteq_page_logo' ) : '';
	$byteq_site_logo = ! empty( $byteq_page_logo['url'] ) ? $byteq_page_logo['url'] : $byteq_customizer_logo;
	?>

	<?php
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {

		if ( ! empty( $byteq_logo_on ) ) { ?>
            <a class="standard-logo-white" href="<?php print esc_url( home_url( '/' ) ); ?>">
                <img src="<?php print esc_url( $byteq_secondary_logo ); ?>"
                     alt="<?php print esc_attr( 'logo', 'byteq' ); ?>"/>
            </a>
			<?php
		} else { ?>
            <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) ); ?>">
                <img src="<?php print esc_url( $byteq_site_logo ); ?>"
                     alt="<?php print esc_attr( 'logo', 'byteq' ); ?>"/>
            </a>
			<?php
		}
	}
	?>
	<?php
}

/**
 * pagination
 */
if ( ! function_exists( 'byteq_pagination' ) ) {

	function _byteq_pagi_callback( $pagination ) {
		return $pagination;
	}

	//page navigation
	function byteq_pagination( $prev, $next, $pages, $args ) {
		global $wp_query, $wp_rewrite;
		$menu = '';
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if ( ! $pages ) {
				$pages = 1;
			}
		}

		$pagination = array(
			'base'      => add_query_arg( 'paged', '%#%' ),
			'format'    => '',
			'total'     => $pages,
			'current'   => $current,
			'prev_text' => $prev,
			'next_text' => $next,
			'type'      => 'array'
		);

		//rewrite permalinks
		if ( $wp_rewrite->using_permalinks() ) {
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		}

		if ( ! empty( $wp_query->query_vars['s'] ) ) {
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		}

		$pagi = '';
		if ( paginate_links( $pagination ) != '' ) {
			$paginations = paginate_links( $pagination );
			$pagi        .= '<ul>';
			foreach ( $paginations as $key => $pg ) {
				$pagi .= '<li>' . $pg . '</li>';
			}
			$pagi .= '</ul>';
		}

		print _byteq_pagi_callback( $pagi );
	}
}


function byteq_check_header() {
	byteq_header_style();
}

add_action( 'byteq_header_style', 'byteq_check_header', 10 );

/**
 * header style
 */

function byteq_header_style() {
	$byteq_header_button      = get_theme_mod( 'byteq_header_button', true );
	$byteq_header_button_text = get_theme_mod( 'byteq_header_button_text', 'Let’s chat' );
	$byteq_header_button_link = get_theme_mod( 'byteq_header_button_link', '#' );
	?>
    <header class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-6 col-md-4 col-8 d-flex align-items-center">
                    <div class="logo">
						<?php byteq_header_logo(); ?>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-6 col-md-8 col-4 d-flex align-items-center justify-content-end">
                    <?php byteq_header_menu(); ?>

					<?php if ( ! empty( $byteq_header_button ) ): ?>
                        <div class="header-btn d-md-inline-block d-none">
                            <a href="<?php echo esc_url( $byteq_header_button_link ); ?>" target="_blank">
								<?php echo $byteq_header_button_text; ?>
                                <i class="fa-regular fa-right-long"></i>
                            </a>
                        </div>
					<?php endif; ?>
                    <div class="menu-bar d-inline-block d-xl-none">
                        <a href="#">
                            <i class="fa-regular fa-bars"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- off-canvas start -->
    <div class="off-canvas-section">
        <div class="off-canvas-wrap">
            <div class="off-canvas-head mb-30">
	            <?php byteq_header_logo(); ?>

                <div class="off-canvas-close">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"></path>
                    </svg>
                </div>
            </div>
            <div class="off-canvas-menu">
				<?php byteq_mobile_menu(); ?>
            </div>
        </div>
        <div class="off-canvas-overlay"></div>
    </div>
    <!-- off-canvas end -->
	<?php
}


/**
 * byteq_header_menu description
 */
function byteq_header_menu() {
	$byteq_menu = wp_nav_menu( array(
		'theme_location'  => 'main-menu',
		'menu_class'      => '',
		'container'       => 'div',
		'container_class' => 'main-menu d-none d-xl-block',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 2,
		'echo'            => false
	) );

//	$byteq_menu = str_replace("menu-item-has-children", "menu-item-has-children", $byteq_menu);

	echo wp_kses_post( $byteq_menu );
}

/**
 * byteq_mobile_menu description
 */
function byteq_mobile_menu() {
	$byteq_menu = wp_nav_menu( array(
		'theme_location'  => 'main-menu',
		'menu_id'         => 'mobile-menu-active',
		'container'       => 'nav',
		'container_class' => 'side-mobile-menu',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 2,
		'echo'            => false
	) );

//	$byteq_menu = str_replace("menu-item-has-children", "menu-item-has-children", $byteq_menu);

	echo wp_kses_post( $byteq_menu );
}


/**
 * byteq_breadcrumb_callback
 * @return string
 */
function byteq_breadcrumb_callback() {
	$args       = array(
		'show_browse'   => false,
		'post_taxonomy' => array( 'product' => 'product_cat' )
	);
	$breadcrumb = new Breadcrumb_Class( $args );

	return $breadcrumb->trail();
}


/**
 * byteq_breadcrumb_func
 */
function byteq_breadcrumb_func() {

	$breadcrumb_class = '';
	$breadcrumb_show  = 1;

	if ( is_front_page() && is_home() ) {
		$title            = get_theme_mod( 'breadcrumb_blog_title', esc_html__( 'Blog', 'byteq' ) );
		$breadcrumb_class = 'home_front_page';

	} elseif ( is_front_page() ) {
		$title = get_theme_mod( 'breadcrumb_blog_title', esc_html__( 'Blog', 'byteq' ) );
//		$breadcrumb_show = 0;
	} elseif ( is_home() ) {
		if ( get_option( 'page_for_posts' ) ) {
			$title = get_the_title( get_option( 'page_for_posts' ) );
		}
	} elseif ( is_single() && 'post' == get_post_type() ) {
		$title = get_the_title();
	} elseif ( is_single() && 'product' == get_post_type() ) {
		$title = get_theme_mod( 'breadcrumb_product_details', esc_html__( 'Shop', 'byteq' ) );
	} elseif ( is_single() && 'byteq-department' == get_post_type() ) {
		if ( rtl_enable() ) {
			$title = get_theme_mod( 'breadcrumb_department_details_rtl', esc_html__( 'Department', 'byteq' ) );
		} else {
			$title = get_theme_mod( 'breadcrumb_department_details', esc_html__( 'Department', 'byteq' ) );
		}

	} elseif ( is_single() && 'byteq-doctor' == get_post_type() ) {
		if ( rtl_enable() ) {
			$title = get_theme_mod( 'breadcrumb_doctor_details_rtl', esc_html__( 'Doctor', 'byteq' ) );
		} else {
			$title = get_theme_mod( 'breadcrumb_doctor_details', esc_html__( 'Doctor', 'byteq' ) );
		}

	} elseif ( is_single() && 'byteq-case_study' == get_post_type() ) {
		if ( rtl_enable() ) {
			$title = get_theme_mod( 'breadcrumb_case_study_details_rtl', esc_html__( 'Gallery', 'byteq' ) );
		} else {
			$title = get_theme_mod( 'breadcrumb_case_study_details', esc_html__( 'Gallery', 'byteq' ) );
		}

	} elseif ( is_search() ) {
		$title = esc_html__( 'Search Results for : ', 'byteq' ) . get_search_query();
	} elseif ( is_404() ) {
		$title = esc_html__( 'Page not Found', 'byteq' );
	} elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		$title = get_theme_mod( 'breadcrumb_shop', esc_html__( 'Shop', 'byteq' ) );
	} elseif ( is_archive() ) {
		$title = get_the_archive_title();
	} else {
		$title = get_the_title();
	}

//	$is_breadcrumb  = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_breadcrumb' ) : '';
	$is_breadcrumb = get_post_meta( get_the_ID(), '_breadcrumb_option', true );

	if ( $is_breadcrumb != 'yes' ) {
		$bg_img_from_page = function_exists( 'get_field' ) ? get_field( 'breadcrumb_background_image' ) : '';
		$hide_bg_img      = function_exists( 'get_field' ) ? get_field( 'hide_breadcrumb_background_image' ) : '';
		$back_title       = function_exists( 'get_field' ) ? get_field( 'breadcrumb_back_title' ) : '';

		// get_theme_mod
		$bg_img = get_theme_mod( 'breadcrumb_bg_img' );


		if ( $hide_bg_img ) {
			$bg_img = '';
		} else {
			$bg_img = ! empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
		}
		if ( ! empty( $bg_img ) ) {
			$breadcrumb_class .= ' page-title-overlay';
		}
		?>

        <div class="page-title-area breadcrumb-bg breadcrumb-spacings <?php print esc_attr( $breadcrumb_class ); ?>"
             data-background="<?php print esc_attr( $bg_img ); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="page-title-content">
                            <h3 class="title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
								<?php echo wp_kses_post( $title ); ?>
                            </h3>
                            <div class="breadcrumb-menu">
								<?php // byteq_breadcrumb_callback(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-4.png" alt="shape">
            </div>
        </div>
		<?php
	}
}

//add_action( 'byteq_before_main_content', 'byteq_breadcrumb_func' );


/**
 * byteq_check_footer
 */
function byteq_check_footer() {
//	$footer_option = get_post_meta( get_the_ID(), '_footer_option', true );
	byteq_footer_style();
//	if ( $footer_option == 'footer_2' ) {
//		byteq_footer_style_2();
//	} else {
//		byteq_footer_style();
//	}

}

add_action( 'byteq_footer_style', 'byteq_check_footer', 10 );

/**
 * footer  style 1
 */
function byteq_footer_style() {
	$byteq_footer_about_text   = get_theme_mod( 'byteq_footer_about_text', 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.' );
    $byteq_footer_phone     = get_theme_mod( 'byteq_footer_phone', '+880-1676-554901' );
	$byteq_footer_contact_text           = get_theme_mod( 'byteq_footer_contact_text', 'Contacts' );
    $byteq_footer_menu_title_1           = get_theme_mod( 'byteq_footer_menu_title_1', 'Services' );
    $byteq_footer_menu_title_2           = get_theme_mod( 'byteq_footer_menu_title_2', 'Company' );
	$footer_social_heading = get_theme_mod( 'footer_social_heading', 'Find Us On' );
	?>
    <div class="footer-area pt-95 pb-95 pt-md-60 pb-md-60 pt-xs-60 pb-xs-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-md-50 mb-xs-50">
                    <div class="footer-about text-lg-start text-md-center text-start">
                        <div class="f-logo">
							<?php byteq_footer_logo(); ?>
                        </div>
                        <?php if(!empty($byteq_footer_about_text)): ?>
                            <div class="text">
                                <p>
                                    <?php echo $byteq_footer_about_text; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($byteq_footer_contact_text)): ?>
                            <h4><?php echo $byteq_footer_contact_text; ?></h4>
                        <?php endif; ?>
                        <?php if(!empty($byteq_footer_phone)): ?>
                            <a href="tel:<?php echo $byteq_footer_phone; ?>">
                                <i class="fa-solid fa-phone"></i> <?php echo $byteq_footer_phone; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-xs-30">
                            <div class="footer-menu">
                                <h3><?php echo $byteq_footer_menu_title_1; ?></h3>
                                <?php echo byteq_footer_menu();?>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-xs-30">
                            <div class="footer-menu">
                                <h3><?php echo $byteq_footer_menu_title_2; ?></h3>
                                <?php echo byteq_footer_menu_2();?>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-xs-30">
                            <div class="footer-social">
                                <h3><?php echo $footer_social_heading; ?></h3>
                                <?php footer_social() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
}

/**
 * copyright text
 */
function byteq_copyright_text() {
	print get_theme_mod( 'byteq_copyright', esc_html__( 'Copyright © 2022 Modern Byteq', 'byteq' ) );
}

/**
 * byteq_footer_menu_1
 */
function byteq_footer_menu() {
	$byteq_menu = wp_nav_menu( array(
		'theme_location'  => 'footer-menu',
		'menu_class'      => '',
		'container'       => '',
		'container_class' => 'footer-menu',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 1,
		'echo'            => false
	) );
	echo wp_kses_post( $byteq_menu );
}

/**
 * byteq_footer_menu_1
 */
function byteq_footer_menu_2() {
	$byteq_menu = wp_nav_menu( array(
		'theme_location'  => 'footer-menu-2',
		'menu_class'      => '',
		'container'       => 'div',
		'container_class' => 'footer-menu-2',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 1,
		'echo'            => false
	) );
	echo wp_kses_post( $byteq_menu );
}

/**
 * footer_social
 */
function footer_social() {
	$byteq_fb_url       = get_theme_mod( 'byteq_fb_url', '#' );
	$byteq_twitter_url  = get_theme_mod( 'byteq_twitter_url', '#' );
	$byteq_linkedin_url = get_theme_mod( 'byteq_linkedin_url', '#' );
	$byteq_youtube_url  = get_theme_mod( 'byteq_youtube_url', '#' );
	?>
    <ul>
        <?php if ( ! empty( $byteq_fb_url ) ): ?>
            <li><a href="<?php echo esc_url( $byteq_fb_url ); ?>"><i class="fa-brands fa-facebook-f"></i> Facebook</a></li>
        <?php endif; ?>
        <?php if ( ! empty( $byteq_linkedin_url ) ): ?>
            <li><a href="<?php echo esc_url( $byteq_linkedin_url ); ?>"><i class="fa-brands fa-linkedin-in"></i> Linkedin</a></li>
        <?php endif; ?>
        <?php if ( ! empty( $byteq_twitter_url ) ): ?>
            <li><a href="<?php echo esc_url( $byteq_twitter_url ); ?>"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
        <?php endif; ?>
        <?php if ( ! empty( $byteq_youtube_url ) ): ?>
            <li><a href="<?php echo esc_url( $byteq_youtube_url ); ?>"><i class="fa-brands fa-youtube"></i> youtube</a></li>
        <?php endif; ?>
    </ul>
	<?php
}

/**
 * footer logo
 */
function byteq_footer_logo() {
	$byteq_logo        = get_template_directory_uri() . '/assets/img/logo/logo.svg';
	$byteq_footer_logo = get_theme_mod( 'byteq_footer_logo', $byteq_logo );
	?>
    <a href="<?php print esc_url( home_url( '/' ) ); ?>">
        <img src="<?php print esc_url( $byteq_footer_logo ); ?>"
             alt="<?php print esc_attr( 'logo', 'byteq' ); ?>"/>
    </a>
	<?php
}

/**
 * byteq_get_tag
 */
function byteq_get_tag() {
	$html = '';
	if ( has_tag() ) {
		$html .= '<div class="blog-post-tag"><span>' . esc_html__( 'Post Tags', 'gocart' ) . '</span>';
		$html .= get_the_tag_list( '', ' ', '' );
		$html .= '</div>';
	}

	return $html;
}