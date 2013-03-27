<?php
/*
	Section: Squared
	Author: Aleksander Hansson
	Author URI: http://ahansson.com
	Demo: http://squared.ahansson.com
	Version: 1.0
	Description: Squared is a fully responsive section that supports up to 15 images or icons with your custom text.
	Class Name: Squared
	Workswith: main
	Cloning: true
*/

/**
 * Squared
 *
 * @package PageLines Framework
 * @author Aleksander Hansson
 */



class Squared extends PageLinesSection {

	function section_styles() {

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'jquery-ui-core' );

		wp_enqueue_script( 'jquery-mousewheel', $this->base_url.'/js/jquery.mousewheel.min.js' );

		wp_enqueue_script( 'jquery-mcustomscrollbar', $this->base_url.'/js/jquery.mCustomScrollbar.min.js' );

		wp_enqueue_script( 'jquery-usquare', $this->base_url.'/js/jquery.usquare.js' );


	}

	function section_head( $clone_id ) {

		$prefix = ($clone_id != '') ? 'Clone'.$clone_id : '';


		?>
			<script type="text/javascript">
				jQuery(document).ready(function($){

					$("#squared<?php echo $prefix; ?>").uSquare({
						opening_speed:		300,
						closing_speed:		500,
						easing:				'swing'
					});
			
				});
			</script>
		<?php

	}

	function section_template( $clone_id ) {

		$prefix = ($clone_id != '') ? 'Clone'.$clone_id : '';

		printf('<div id="squared%s" class="usquare_module_wrapper">', $prefix ) ;

		?>
			<div id="squared" class="usquare_module_wrapper">
			
				<div class="usquare_module_shade"></div>
					<?php

						$squares = ( ploption( 'squared_squares', $this->oset ) ) ? ploption( 'squared_squares', $this->oset ) : '1' ;

						$output = '';
						for ( $i = 1; $i <= $squares; $i++ ) {

							if ( ploption( 'squared_image_'.$i, $this->oset ) ) {

								$the_background_color = ( ploption( 'squared_background_color_'.$i, $this->oset ) ) ? ploption( 'squared_background_color_'.$i, $this->oset ) : '#444444' ;

								$the_img = ploption( 'squared_image_'.$i, $this->oset );

								$the_head_color = ( ploption( 'squared_head_color_'.$i, $this->oset ) ) ? ploption( 'squared_head_color_'.$i, $this->oset ) : '#ffffff' ;

								$the_subhead_color = ( ploption( 'squared_subhead_color_'.$i, $this->oset ) ) ? ploption( 'squared_subhead_color_'.$i, $this->oset ) : '#ffffff' ;

								$the_about_head_color = ( ploption( 'squared_about_head_color_'.$i, $this->oset ) ) ? ploption( 'squared_about_head_color_'.$i, $this->oset ) : '#000' ;

								$the_about_head = ( ploption( 'squared_about_head_'.$i, $this->tset ) ) ? sprintf( '<span class="bold" style="color:%s;">%s</span>', $the_about_head_color, ploption( 'squared_about_head_'.$i, $this->tset) ) :'' ;

								$the_about_body_color = ( ploption( 'squared_about_body_color_'.$i, $this->oset ) ) ? ploption( 'squared_about_body_color_'.$i, $this->oset ) : '#000' ;

								$the_about_body = ( ploption( 'squared_about_body_'.$i, $this->tset ) ) ? sprintf( '<div class="usquare_about" style="color:%s;">%s</div>', $the_about_body_color, ploption( 'squared_about_body_'.$i, $this->tset) ) :'' ;

								$img = ( $the_img ) ? sprintf( '<img src="%s" class="usquare_square" alt="" />', $the_img) : '' ;

								$icons_count = ( ploption( 'squared_about_icons_'.$i, $this->oset ) ) ? ploption( 'squared_about_icons_'.$i, $this->oset ) : 1 ;

								$icons = '';

								for ( $y = 1; $y <= $icons_count; $y++ ) {
									if ( ploption( 'squared_icons_'.$i.$y, $this->oset ) ) {
										$icons .= sprintf('<li><a href="%s"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.$y, $this->oset ), ploption('squared_icons_'.$i.$y, $this->oset ) );
									} else {
										$icons .='';
									}

								}

								if ($i > 3 && $i < 7 || $i > 9 && $i < 13 ) {
									$the_head = ( ploption( 'squared_head_'.$i, $this->tset ) ) ? sprintf( '<h3 class="usquare_r" style="color:%s;">%s</h3>', $the_head_color, ploption( 'squared_head_'.$i, $this->tset ) ) : '' ;

									$the_subhead = ( ploption( 'squared_subhead_'.$i, $this->tset ) ) ? sprintf( '<span class="usquare_r" style="color:%s;">%s</span>', $the_subhead_color, ploption( 'squared_subhead_'.$i, $this->tset ) ) : '' ;

									$arrow = sprintf('<img src="%s" class="usquare_arrow usquare_arrow_r" alt="arrow" />', $this->base_url.'/img/arrow_r.png');

									$close = sprintf('<a href="#" class="close close_left_side"><i class="icon-remove"></i></a>');

									$img_position = sprintf('<div class="usquare_square usquare_square_bg%s"><div class="usquare_square_text_wrapper">%s<div class="row"></div>%s%s<div class="row"></div></div></div>%s', $i, $arrow, $the_head, $the_subhead, $img );

								} else {
									$the_head = ( ploption( 'squared_head_'.$i, $this->tset ) ) ? sprintf( '<h3 style="color:%s;">%s</h3>', $the_head_color, ploption( 'squared_head_'.$i, $this->tset ) ) : '' ;

									$the_subhead = ( ploption( 'squared_subhead_'.$i, $this->tset ) ) ? sprintf( '<span style="color:%s;">%s</span>', $the_subhead_color, ploption( 'squared_subhead_'.$i, $this->tset ) ) : '' ;

									$arrow = sprintf('<img src="%s" class="usquare_arrow" alt="arrow" />', $this->base_url.'/img/arrow.png');

									$close = sprintf('<a href="#" class="close"><i class="icon-remove"></i></a>');

									$img_position = sprintf('%s<div class="usquare_square usquare_square_bg%s"><div class="usquare_square_text_wrapper">%s<div class="row"></div>%s%s<div class="row"></div></div></div>', $img, $i, $arrow, $the_head, $the_subhead );

								}

								if ( $the_img ) {
									$output .= sprintf( '<div class="usquare_block" style="background-color:%s;">%s<div class="usquare_block_extended usquare_square_bg%s" style="background-color:%s;">%s<ul class="social_background">%s</ul><div class="row"></div>%s%s</div></div>', $the_background_color, $img_position, $i, $the_background_color, $close, $icons, $the_about_head, $the_about_body );
								} else {
									$output .='';
								}

							}
						}

						if ( $output == '' ) {
							$this->do_defaults();
						} else {
							echo $output;
						
						}

					?>
				
			</div>

		<?php 		
	}

	function do_defaults() {
		echo setup_section_notify($this, __('Please set up Squared.'));
	}


	function section_optionator( $settings ) {
		
		$settings = wp_parse_args( $settings, $this->optionator_default );

		$array = array();

		$array['squared_squares'] = array(
			'type'    => 'count_select',
			'count_start' => 1,
			'count_number'  => 15,
			'default'  => 1,
			'inputlabel'  => __( 'Number of Squares to Configure', 'pagelines' ),
			'title'   => __( 'Number of Squares', 'pagelines' ),
			'shortexp'   => __( 'Enter the number of Squares.', 'pagelines' ),
			'exp'    => __( "This number will be used to generate Squares and option setup. Option will update when settings is saved.", 'pagelines' ),
		);

		global $post_ID;

		$oset = array( 'post_id' => $post_ID, 'clone_id' => $settings['clone_id'], 'type' => $settings['type'] );

		$squares = ( ploption( 'squared_squares', $oset ) ) ? ploption( 'squared_squares', $oset ) : '1' ;

		for ( $i = 1; $i <= $squares; $i++ ) {

			$array['squared_square_'.$i] = array(
				'type'    => 'multi_option',
				'selectvalues' => array(

					'squared_image_'.$i  => array(
						'inputlabel'  => __( 'Squared Image', 'Squared' ),
						'type'   => 'image_upload',
						'title'   => __( 'Squared Image ', 'Squared' ) . $i,
						'shortexp'   => __( 'Upload an image...', 'Squared' )

					),
					'squared_background_color_'.$i  => array(
						'inputlabel' => __( 'Color', 'Squared' ),
						'type'   => 'colorpicker',
						'title'   => __( 'Squared Background Color ', 'Squared' ) . $i,
						'shortexp'   => __( 'Select a background color...', 'Squared' )
					),
					'squared_head_'.$i  => array(
						'inputlabel' => __( 'Squared Heading', 'Squared' ),
						'type'   => 'text',
						'title'   => __( 'Squared Heading ', 'Squared' ) . $i,
						'shortexp'   => __( 'Add a heading text...', 'Squared' )
					),
					'squared_head_color_'.$i  => array(
						'inputlabel' => __( 'Color', 'Squared' ),
						'type'   => 'colorpicker'
					),
					'squared_subhead_'.$i  => array(
						'inputlabel' => __( 'Squared Subheading', 'Squared' ),
						'type'   => 'text',
						'title'   => __( 'Squared Subheading ', 'Squared' ) . $i,
						'shortexp'   => __( 'Add a subheading...', 'Squared' )
					),
					'squared_subhead_color_'.$i  => array(
						'inputlabel' => __( 'Color', 'Squared' ),
						'type'   => 'colorpicker'
					),
					'squared_about_head_'.$i  => array(
						'inputlabel' => __( 'Squared About Heading', 'Squared' ),
						'type'   => 'text',
						'title'   => __( 'Squared About Heading ', 'Squared' ) . $i,
						'shortexp'   => __( 'Add a header...', 'Squared' )
					),
					'squared_about_head_color_'.$i  => array(
						'inputlabel' => __( 'Color', 'Squared' ),
						'type'   => 'colorpicker'
					),
					'squared_about_body_'.$i  => array(
						'inputlabel' => __( 'Squared About Body', 'Squared' ),
						'type'   => 'textarea',
						'title'   => __( 'Squared About Body ', 'Squared' ) . $i,
						'shortexp'   => __( 'Add a body text...', 'Squared' )
					),
					'squared_about_body_color_'.$i  => array(
						'inputlabel' => __( 'Color', 'Squared' ),
						'type'   => 'colorpicker'
					),
					'squared_about_icons_'.$i => array(
						'type'    => 'count_select',
						'count_start' => 1,
						'count_number'  => 8,
						'default'  => 1,
						'inputlabel'  => __( 'Icons to configure ', 'Squared' ) . $i,
						'title'   => __( 'About text icons ', 'Squared' ) . $i,
						'shortexp'   => __( 'Enter the number of Font Awesome Icons you want. Option will update when settings is saved.', 'Squared' )
					),
				),
				'title'   => __( 'Square ', 'Squared' ) . $i,
				'shortexp'   => __( 'Setup options for square number ', 'Squared' ) . $i,
			);

			$icons_count = ( ploption( 'squared_about_icons_'.$i, $oset ) ) ? ploption( 'squared_about_icons_'.$i, $oset ) : '1' ;

			for ( $y = 1; $y <= $icons_count; $y++ ) {
				$array['squared_icons_multi_'.$i.$y] = array(
					'type'    => 'multi_option',
					'selectvalues' => array(
						'squared_icons_'.$i.$y  => array(
							'inputlabel' => __( sprintf('Font Awesome Icon %s: <br/>Example: "icon-facebook" Find them all at <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>.', $y), 'Squared' ),
							'type'   => 'text',
						),
						'squared_icons_link_'.$i.$y  => array(
							'inputlabel' => __( sprintf('Icon link %s: <br/>Example: "http://facebook.com".', $y), 'Squared' ),
							'type'   => 'text',
						),
					),
				);
			}

		}

		$metatab_settings = array(
			'id'   => 'squared_options',
			'name'   => __( 'Squared', 'Squared' ),
			'icon'   => $this->icon,
			'clone_id' => $settings['clone_id'],
			'active' => $settings['active']
		);

		register_metatab( $metatab_settings, $array );

	}

}
