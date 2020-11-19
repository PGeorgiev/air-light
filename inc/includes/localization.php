<?php
/**
 * @Author: Timi Wahalahti
 * @Date:   2019-12-03 11:03:31
 * @Last Modified by:   Timi Wahalahti
 * @Last Modified time: 2020-11-19 11:35:56
 *
 * @package air-light
 */

namespace Air_Light;

add_filter( 'air_helper_pll_register_strings', function() { // phpcs:ignore
  $strings = [
    // 'Key: String' => 'String',
  ];

  /**
   * Uncomment if you need to have default air-light accessibility strings
   * translatable via Polylang string translations.
   */
  // foreach ( get_default_localization_strings() as $key => $value ) {
  // $strings[ "Accessibility: {$key}" ] = $value;
  // }

  return $strings;
} );

function get_default_localization_strings( $language = 'en' ) {
  $strings = [
    'en'  => [
      'Open main menu'        => __( 'Open main menu', 'air-light' ),
      'Close main menu'       => __( 'Close main menu', 'air-light' ),
      'Main navigation'       => __( 'Main navigation', 'air-light' ),
      'Back to top'           => __( 'Back to top', 'air-light' ),
      'Open child menu'       => __( 'Open child menu', 'air-light' ),
      'Open child menu for'   => __( 'Open child menu for', 'air-light' ),
      'Close child menu'      => __( 'Close child menu', 'air-light' ),
      'Close child menu for'  => __( 'Close child menu for', 'air-light' ),
      'Skip to content'       => __( 'Skip to content', 'air-light' ),
      'External site:'        => __( 'External site:', 'air-light' ),
      'opens in a new window' => __( 'opens in a new window', 'air-light' ),
    ],
    'fi'  => [
      'Open main menu'        => 'Avaa päävalikko',
      'Close main menu'       => 'Sulje päävalikko',
      'Main navigation'       => 'Päävalikko',
      'Back to top'           => 'Takaisin ylös',
      'Open child menu'       => 'Avaa alavalikko',
      'Open child menu for'   => 'Avaa alavalikko kohteelle',
      'Close child menu'      => 'Sulje alavalikko',
      'Close child menu for'  => 'Sulje alavalikko kohteelle',
      'Skip to content'       => 'Takaisin ylös',
      'External site:'        => 'Ulkoinen sivusto:',
      'opens in a new window' => 'avautuu uuteen ikkunaan',
    ],
  ];

  return ( array_key_exists( $language, $strings ) ) ? $strings[ $language ] : $strings['en'];
} // end get_default_localization_strings

function get_default_localization( $string ) {
  if ( function_exists( 'ask__' ) && array_key_exists( "Accessibility: {$string}", apply_filters( 'air_helper_pll_register_strings', [] ) ) ) {
    return ask__( "Accessibility: {$string}" );
  }

  return esc_html( get_default_localization_translation( $string ) );
} // end get_default_localization

function get_default_localization_translation( $string ) {
  $language = get_bloginfo( 'language' );
  if ( function_exists( 'pll_the_languages' ) ) {
    $language = pll_current_language();
  }

  $translations = get_default_localization_strings( $language );

  return ( array_key_exists( $string, $translations ) ) ? $translations[ $string ] : '';
} // end get_default_localization_translation
