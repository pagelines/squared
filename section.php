<?php
/*
	Section: Squared
	Author: Aleksander Hansson
	Author URI: http://ahansson.com
	Demo: http://squared.ahansson.com
	Version: 1.4
	Description: Squared is an interactive grid system that supports up to 15 images or icons with your custom text. It is awesome!
	Class Name: Squared
	Workswith: main, templates
	Cloning: true
*/

class Squared extends PageLinesSection {

	function section_styles() {

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'jquery-ui-core' );

		wp_enqueue_script( 'jquery-mousewheel', $this->base_url.'/js/jquery.mousewheel.min.js' );

		wp_enqueue_script( 'jquery-mcustomscrollbar', $this->base_url.'/js/jquery.mCustomScrollbar.min.js' );

		wp_enqueue_script( 'jquery-usquare', $this->base_url.'/js/jquery.usquare.js' );


	}

	function section_head() {

		$clone_id = $this->oset['clone_id'];

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

	function section_template() {

		$clone_id = $this->oset['clone_id'];

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

								if ( ploption( 'squared_icons_'.$i.'1', $this->oset ) ) {
									$icons1 = sprintf('<li><a href="%s" target="_blank"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.'1', $this->oset ), ploption('squared_icons_'.$i.'1', $this->oset ) );
								} else {
									$icons1 ='';
								}
								if ( ploption( 'squared_icons_'.$i.'2', $this->oset ) ) {
									$icons2 = sprintf('<li><a href="%s" target="_blank"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.'2', $this->oset ), ploption('squared_icons_'.$i.'2', $this->oset ) );
								} else {
									$icons2 ='';
								}
								if ( ploption( 'squared_icons_'.$i.'3', $this->oset ) ) {
									$icons3 = sprintf('<li><a href="%s" target="_blank"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.'3', $this->oset ), ploption('squared_icons_'.$i.'3', $this->oset ) );
								} else {
									$icons3 ='';
								}
								if ( ploption( 'squared_icons_'.$i.'4', $this->oset ) ) {
									$icons4 = sprintf('<li><a href="%s" target="_blank"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.'4', $this->oset ), ploption('squared_icons_'.$i.'4', $this->oset ) );
								} else {
									$icons4 ='';
								}
								if ( ploption( 'squared_icons_'.$i.'5', $this->oset ) ) {
									$icons5 = sprintf('<li><a href="%s" target="_blank"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.'5', $this->oset ), ploption('squared_icons_'.$i.'5', $this->oset ) );
								} else {
									$icons5 ='';
								}
								if ( ploption( 'squared_icons_'.$i.'5', $this->oset ) ) {
									$icons5 = sprintf('<li><a href="%s" target="_blank"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.'5', $this->oset ), ploption('squared_icons_'.$i.'5', $this->oset ) );
								} else {
									$icons5 ='';
								}
								if ( ploption( 'squared_icons_'.$i.'6', $this->oset ) ) {
									$icons6 = sprintf('<li><a href="%s" target="_blank"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.'6', $this->oset ), ploption('squared_icons_'.$i.'6', $this->oset ) );
								} else {
									$icons6 ='';
								}
								if ( ploption( 'squared_icons_'.$i.'7', $this->oset ) ) {
									$icons7 = sprintf('<li><a href="%s" target="_blank"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.'7', $this->oset ), ploption('squared_icons_'.$i.'7', $this->oset ) );
								} else {
									$icons7 ='';
								}
								if ( ploption( 'squared_icons_'.$i.'8', $this->oset ) ) {
									$icons8 = sprintf('<li><a href="%s" target="_blank"><i class="%s"></i></a></li>', ploption('squared_icons_link_'.$i.'8', $this->oset ), ploption('squared_icons_'.$i.'8', $this->oset ) );
								} else {
									$icons8 ='';
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
									$output .= sprintf( '<div class="usquare_block" style="background-color:%s;">%s<div class="usquare_block_extended usquare_square_bg%s" style="background-color:%s;">%s<ul class="social_background">%s%s%s%s%s%s%s%s</ul><div class="row"></div>%s%s</div></div>', $the_background_color, $img_position, $i, $the_background_color, $close, $icons1, $icons2, $icons3, $icons4, $icons5, $icons6, $icons7, $icons8, $the_about_head, $the_about_body );
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
		echo setup_section_notify($this, __('Please set up Squared.', 'Squared'));
	}


	function section_optionator( $settings ) {

		$settings = wp_parse_args( $settings, $this->optionator_default );

		$array = array();

		$array['squared_squares'] = array(
			'type'    => 'count_select',
			'count_start' => 1,
			'count_number'  => 15,
			'default'  => 1,
			'inputlabel'  => __( 'Number of Squares to Configure', 'Squared' ),
			'title'   => __( 'Number of Squares', 'Squared' ),
			'shortexp'   => __( 'Enter the number of Squares.', 'Squared' ),
			'exp'    => __( "This number will be used to generate Squares and option setup. Option will update when settings are saved.", 'Squared' ),
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
						'shortexp'   => __( 'Upload an image... </br>Recommended image size: 160x160</br>Images will scale to match the size of the square, not crop.', 'Squared' )

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
						'shortexp'   => __( 'Add a heading text... </br>Recommended character limit: 20', 'Squared' )
					),
					'squared_head_color_'.$i  => array(
						'inputlabel' => __( 'Color', 'Squared' ),
						'title'   => 'Squared Head Color ' .$i ,
						'type'   => 'colorpicker'
					),
					'squared_subhead_'.$i  => array(
						'inputlabel' => __( 'Squared Subheading', 'Squared' ),
						'type'   => 'text',
						'title'   => __( 'Squared Subheading ', 'Squared' ) . $i,
						'shortexp'   => __( 'Add a subheading... </br>Recommended character limit: 35', 'Squared' )
					),
					'squared_subhead_color_'.$i  => array(
						'inputlabel' => __( 'Color', 'Squared' ),
						'title'   => 'Subhead Color ' .$i,
						'type'   => 'colorpicker'
					),
					'squared_about_head_'.$i  => array(
						'inputlabel' => __( 'Squared About Heading', 'Squared' ),
						'type'   => 'text',
						'title'   => __( 'Squared About Heading ', 'Squared' ) . $i,
						'shortexp'   => __( 'Add a header...', 'Squared' )
					),
					'squared_about_head_color_'.$i  => array(
						'title'   => 'Squared About Head Color ' .$i,
						'inputlabel' => __( 'Color', 'Squared' ),
						'type'   => 'colorpicker'
					),
					'squared_about_body_'.$i  => array(
						'inputlabel' => __( 'Squared About Body', 'Squared' ),
						'type'   => 'textarea',
						'title'   => __( 'Squared About Body ', 'Squared' ) . $i,
						'shortexp'   => __( 'Add body text...', 'Squared' )
					),
					'squared_about_body_color_'.$i  => array(
						'title'   => 'Squared Body Color ' .$i,
						'inputlabel' => __( 'Color', 'Squared' ),
						'type'   => 'colorpicker'
					),
					'squared_icons_'.$i.'1'  => array(
						'title'   => 'Squared Icon 1',
						'inputlabel' => __( sprintf('Font Awesome Icon %s: <br/>Example: "icon-facebook" Find them all at <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>.', '1'), 'Squared' ),
						'type'   => 'text',
					),
					'squared_icons_link_'.$i.'1'  => array(
                        'inputlabel' => __( sprintf('Icon link %s: <br/>Example: "http://facebook.com".', '1'), 'Squared' ),
                        'type'   => 'text',
                    ),
					'squared_icons_'.$i.'2'  => array(
						'title'   => 'Squared Icon 2',
						'inputlabel' => __( sprintf('Font Awesome Icon %s: <br/>Example: "icon-facebook" Find them all at <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>.', '2'), 'Squared' ),
						'type'   => 'text',
					),
					'squared_icons_link_'.$i.'2'  => array(
                        'inputlabel' => __( sprintf('Icon link %s: <br/>Example: "http://facebook.com".', '2'), 'Squared' ),
                        'type'   => 'text',
                    ),
					'squared_icons_'.$i.'3'  => array(
						'title'   => 'Squared Icon 3',
						'inputlabel' => __( sprintf('Font Awesome Icon %s: <br/>Example: "icon-facebook" Find them all at <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>.', '3'), 'Squared' ),
						'type'   => 'text',
					),
					'squared_icons_link_'.$i.'3'  => array(
                        'inputlabel' => __( sprintf('Icon link %s: <br/>Example: "http://facebook.com".', '3'), 'Squared' ),
                        'type'   => 'text',
                    ),
					'squared_icons_'.$i.'4'  => array(
						'title'   => 'Squared Icon 4',
						'inputlabel' => __( sprintf('Font Awesome Icon %s: <br/>Example: "icon-facebook" Find them all at <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>.', '4'), 'Squared' ),
						'type'   => 'text',
					),
					'squared_icons_link_'.$i.'4'  => array(
                        'inputlabel' => __( sprintf('Icon link %s: <br/>Example: "http://facebook.com".', '4'), 'Squared' ),
                        'type'   => 'text',
                    ),
					'squared_icons_'.$i.'5'  => array(
						'title'   => 'Squared Icon 5',
						'inputlabel' => __( sprintf('Font Awesome Icon %s: <br/>Example: "icon-facebook" Find them all at <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>.', '5'), 'Squared' ),
						'type'   => 'text',
					),
					'squared_icons_link_'.$i.'5'  => array(
                        'inputlabel' => __( sprintf('Icon link %s: <br/>Example: "http://facebook.com".', '5'), 'Squared' ),
                        'type'   => 'text',
                    ),
					'squared_icons_'.$i.'6'  => array(
						'title'   => 'Squared Icon 6',
						'inputlabel' => __( sprintf('Font Awesome Icon %s: <br/>Example: "icon-facebook" Find them all at <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>.', '6'), 'Squared' ),
						'type'   => 'text',
					),
					'squared_icons_link_'.$i.'6'  => array(
                        'inputlabel' => __( sprintf('Icon link %s: <br/>Example: "http://facebook.com".', '6'), 'Squared' ),
                        'type'   => 'text',
                    ),
					'squared_icons_'.$i.'7'  => array(
						'title'   => 'Squared Icon 7',
						'inputlabel' => __( sprintf('Font Awesome Icon %s: <br/>Example: "icon-facebook" Find them all at <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>.', '7'), 'Squared' ),
						'type'   => 'text',
					),
					'squared_icons_link_'.$i.'7'  => array(
                        'inputlabel' => __( sprintf('Icon link %s: <br/>Example: "http://facebook.com".', '7'), 'Squared' ),
                        'type'   => 'text',
                    ),
					'squared_icons_'.$i.'8'  => array(
						'title'   => 'Squared Icon 8',
						'inputlabel' => __( sprintf('Font Awesome Icon %s: <br/>Example: "icon-facebook" Find them all at <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>.', '8'), 'Squared' ),
						'type'   => 'text',
					),
					'squared_icons_link_'.$i.'8'  => array(
                        'inputlabel' => __( sprintf('Icon link %s: <br/>Example: "http://facebook.com".', '8'), 'Squared' ),
                        'type'   => 'text',
                    ),
				),
				'title'   => __( 'Square ', 'Squared' ) . $i,
				'shortexp'   => __( 'Setup options for square number ', 'Squared' ) . $i,
			);

		}

		$metatab_settings = array(
			'id'   => 'squared_options',
			'name'   => 'Squared',
			'icon'   => $this->icon,
			'clone_id' => $settings['clone_id'],
			'active' => $settings['active']
		);

		register_metatab( $metatab_settings, $array );

	}

}
