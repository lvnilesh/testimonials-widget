<?php
/**
 * Plugin Name: Testimonials by Aihrus
 * Plugin URI: http://wordpress.org/plugins/testimonials-widget/
 * Description: Testimonials by Aihrus lets you randomly slide or list selected portfolios, quotes, reviews, or text with images or videos on your WordPress site.
 * Version: 2.17.3-alpha
 * Author: Michael Cannon
 * Author URI: http://aihr.us/resume/
 * License: GPLv2 or later
 * Text Domain: testimonials-widget
 * Domain Path: /languages
 */


/**
 * Copyright 2013 Michael Cannon (email: mc@aihr.us)
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

define( 'TW_AIHR_VERSION', '1.0.1' );
define( 'TW_BASE', plugin_basename( __FILE__ ) );
define( 'TW_DIR', plugin_dir_path( __FILE__ ) );
define( 'TW_DIR_INC', TW_DIR . '/includes' );
define( 'TW_DIR_LIB', TW_DIR_INC . '/libraries' );
define( 'TW_NAME', 'Testimonials by Aihrus' );
define( 'TW_PREMIUM_LINK', '<a href="http://aihr.us/downloads/testimonials-widget-premium-wordpress-plugin/">Purchase Testimonials Premium</a>' );
define( 'TW_VERSION', '2.17.3-alpha' );

require_once TW_DIR_INC . '/requirements.php';

if ( ! tw_requirements_check() ) {
	return false;
}

require_once TW_DIR_INC . '/class-testimonials-widget.php';

add_action( 'plugins_loaded', 'testimonialswidget_init', 99 );


/**
 *
 *
 * @SuppressWarnings(PHPMD.LongVariable)
 * @SuppressWarnings(PHPMD.UnusedLocalVariable)
 */
function testimonialswidget_init() {
	if ( Testimonials_Widget::version_check() ) {
		global $Testimonials_Widget_Settings;
		if ( is_null( $Testimonials_Widget_Settings ) )
			$Testimonials_Widget_Settings = new Testimonials_Widget_Settings();

		global $Testimonials_Widget;
		if ( is_null( $Testimonials_Widget ) )
			$Testimonials_Widget = new Testimonials_Widget();
	}
}


function testimonialswidget_list( $atts = array() ) {
	global $Testimonials_Widget;

	return $Testimonials_Widget->testimonialswidget_list( $atts );
}


function testimonialswidget_widget( $atts = array(), $widget_number = null ) {
	global $Testimonials_Widget;

	return $Testimonials_Widget->testimonialswidget_widget( $atts, $widget_number );
}


?>
