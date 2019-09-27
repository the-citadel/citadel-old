<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'citadel_report_problem' ) ) {
	function citadel_report_problem() {
		do_action( 'citadel_report_problem' );
	}
}

if ( ! function_exists( 'citadel_add_report_problem' ) ) {
	add_action( 'citadel_report_problem', 'citadel_add_report_problem' );

	function citadel_add_report_problem() {

		$report_text = sprintf(
			'%1$s <a href="%2$s" id="%3$s">%4$s</a>',
			sprintf(
				esc_html__( 'Outdated? Incorrect? Broken?' )
			),
			esc_url( __( 'https://citadel/web/issue', 'citadel' ) ),
			sprintf(
				esc_html__( 'report-problem' )
			),
			sprintf(
				esc_html__( 'Report a problem with this page.' )
			)
		);

		echo apply_filters( 'citadel_report_problem_content', $report_text );

	}
}

if ( ! function_exists( 'citadel_footer_copyright' ) ) {
	function citadel_footer_copyright() {
		do_action( 'citadel_footer_copyright' );
	}
}

if ( ! function_exists( 'citadel_add_footer_copyright' ) ) {
	add_action( 'citadel_footer_copyright', 'citadel_add_footer_copyright' );

	function citadel_add_footer_copyright() {

		$allow = "(^155\.225\.\d+\.\d+$)";

		$login_text = sprintf(
			' | <a href="%1$s">%2$s</a>',
			esc_url( site_url() . '/wp-admin', 'citadel' ),
			sprintf(
				esc_html__( 'Login' )
			)
		);

		$allowed = preg_match( $allow, $_SERVER['REMOTE_ADDR'] ) ? $login_text : '';

		$copyright_text = sprintf(
			'&copy; ' . date('Y') . ' <a href="%1$s">%2$s</a>. %3$s%4$s',
			esc_url( __( 'https://citadel.edu/', 'citadel' ) ),
			sprintf(
				esc_html__( 'The Citadel' )
			),
			sprintf(
				esc_html__( 'All rights reserved.' )
			),
			$allowed
		);

		echo apply_filters( 'citadel_footer_copyright_content', $copyright_text );
		
	}
}