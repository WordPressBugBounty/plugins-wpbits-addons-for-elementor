<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_WPBITS_AFE_Tooltip extends Widget_Base {

	public function get_name() {
		return 'wpb-tooltip';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Tooltip', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}
	
    public function get_script_depends() {
		return [ 'wpb-tooltip' ];
	}

	public function get_icon() {
		return 'eicon-info-circle-o';
	}
	
    public function get_widget_image_sizes() {
        $output_sizes = array();
        $img_sizes = get_intermediate_image_sizes();
        $output_sizes['full'] = esc_html__( 'Full', 'wpbits-addons-for-elementor' );
        foreach ($img_sizes as $size_name) {
            $output_sizes[$size_name] = $size_name;
        }
        return $output_sizes;
	}
		
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'content_section',
  			[
  				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 

        $this->add_control(
			'content_type',
			[
				'label' => esc_html__( 'Content Type', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon'  => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
                    'text'  => esc_html__( 'Text', 'wpbits-addons-for-elementor' ),
					'image'  => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
                    'shortcode'  => esc_html__( 'Shortcode', 'wpbits-addons-for-elementor' )
				],
			]
		);
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => ['content_type' => 'icon'],
			]
		);
        
        $this->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'condition' => ['content_type' => 'text'],
				'default' => '',
				'show_label' => false,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => ['content_type' => 'image'],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
				'condition' => ['content_type' => 'image'],
			]
		);

		
        $this->add_control(
			'shortcode',
			[
				'label' => esc_html__('Shortcode', 'wpbits-addons-for-elementor'),
                'condition' => ['content_type' => 'shortcode'],
				'type' => Controls_Manager::TEXTAREA
			]
		); 
        
        $this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link to', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://wpbits.net', 'wpbits-addons-for-elementor' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
  		$this->start_controls_section(
  			'content_tooltip',
  			[
  				'label' => esc_html__( 'Tooltip', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 
 
        $this->add_control(
			'tooltip_content', [
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'show_label' => false,
			]
		);
        
        $this->end_controls_section();
        
        // section start
  		$this->start_controls_section(
  			'content_tooltip_settings',
  			[
  				'label' => esc_html__( 'Tooltip Settings', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 
        
        $this->add_control(
			'anim',
			[
				'label' => esc_html__( 'Animation', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
                'label_block' => true
			]
		);
        
        $this->add_control(
			'follow_mouse',
			[
				'label' => esc_html__( 'Follow Mouse', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
                'description' => esc_html__( 'If set to enabled the tooltip will follow the users mouse cursor.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'mouse_on_to_popup',
			[
				'label' => esc_html__( 'Mouse on to Popup', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
                'description' => esc_html__( 'Allow the mouse to hover on the tooltip. This lets users interact with the content in the tooltip. Only applies if Follow Mouse is disabled.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'placement',
			[
				'label' => esc_html__( 'Placement', 'wpbits-addons-for-elementor' ),
                'description' => esc_html__( 'Placement location of the tooltip relative to the element it is open for.', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'n',
				'options' => [
					'n'  => esc_html__( 'Top', 'wpbits-addons-for-elementor' ),
					'e'  => esc_html__( 'Right', 'wpbits-addons-for-elementor' ),
                    'w'  => esc_html__( 'Left', 'wpbits-addons-for-elementor' ),
                    's'  => esc_html__( 'Bottom', 'wpbits-addons-for-elementor' ),
                    'nw'  => esc_html__( 'Top-Left', 'wpbits-addons-for-elementor' ),
					'ne'  => esc_html__( 'Top-Right', 'wpbits-addons-for-elementor' ),
                    'sw'  => esc_html__( 'Bottom-Left', 'wpbits-addons-for-elementor' ),
                    'se'  => esc_html__( 'Bottom-Right', 'wpbits-addons-for-elementor' ),
                    'nw-alt'  => esc_html__( 'Top-Left-Alt', 'wpbits-addons-for-elementor' ),
					'ne-alt'  => esc_html__( 'Top-Right-Alt', 'wpbits-addons-for-elementor' ),
                    'sw-alt'  => esc_html__( 'Bottom-Left-Alt', 'wpbits-addons-for-elementor' ),
                    'se-alt'  => esc_html__( 'Bottom-Right-Alt', 'wpbits-addons-for-elementor' ),
				],
			]
		);
        
        $this->add_control(
			'smart_placement',
			[
				'label' => esc_html__( 'Smart Placement', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
                'description' => esc_html__( 'When enabled the plugin will try to keep tips inside the browser viewport. Only applies if follow mouse is disabled.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'offset',
			[
				'label' => esc_html__( 'Offset', 'wpbits-addons-for-elementor' ),
                'description' => esc_html__( 'This will be the offset from the element the tooltip is open for, or from the mouse cursor if follow mouse is enabled.', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 10
			]
		);

		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'style_icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['content_type' => 'icon']
			]
		);

		$this->add_responsive_control(
			'icon_h_align',
			[
				'label' => esc_html__( 'Horizontal Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_control(
			'icon_duration',
			[
				'label' => esc_html__( 'Animation Duration', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10,
				'step' => 0.1,
				'default' => 0.2,
                'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper i' => 'transition-duration: {{VALUE}}s;',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg' => 'transition-duration: {{VALUE}}s;'
				],
			]
		);

		$this->start_controls_tabs( 'tabs_icon' );
        
        $this->start_controls_tab(
			'icon_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits' ),
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
                    '{{WRAPPER}} .wpb-tooltip-wrapper i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg' => 'fill: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .wpb-tooltip-wrapper i' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg' => 'background-color: {{SIZE}}{{UNIT}};'
				]
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'icon_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbits' ),
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper i:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg:hover' => 'fill: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper i:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg:hover' => 'background-color: {{VALUE}};'
				]
			]
		);

        $this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_control(
			'icon_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Font Size', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
                    '{{WRAPPER}} .wpb-tooltip-wrapper i' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'icon_height',
			[
				'label' => esc_html__( 'Height', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
                    '{{WRAPPER}} .wpb-tooltip-wrapper i' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'icon_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-tooltip-wrapper i,{{WRAPPER}} .wpb-tooltip-wrapper svg'
			]
		);

		$this->add_responsive_control(
			'icon_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper i' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wpb-tooltip-wrapper svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_thumbnail',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['content_type' => 'image']
			]
		);

		$this->add_responsive_control(
			'max_img_size',
			[
				'label' => esc_html__( 'Max. Image Size (px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 2000,
				'step' => 10,
                'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper img' => 'max-width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'img_h_align',
			[
				'label' => esc_html__( 'Horizontal Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_control(
			'thumbnail_opacity_duration',
			[
				'label' => esc_html__( 'Opacity Animation Duration', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10,
				'step' => 0.1,
				'default' => 0.2,
                'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper img' => 'transition-duration: {{VALUE}}s;'
				],
			]
		);

		$this->add_control(
			'thumb_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->start_controls_tabs( 'tabs_thumbnail_style' );
        
        $this->start_controls_tab(
			'tab_thumbnail_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'thumbnail_opacity',
			[
				'label' => esc_html__( 'Opacity', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper img' => 'opacity: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_css_filter',
				'label' => esc_html__( 'CSS Filters', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-tooltip-wrapper img'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_thumbnail_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbits-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'thumbnail_hover_opacity',
			[
				'label' => esc_html__( 'Opacity', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper:hover img' => 'opacity: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_hover_css_filter',
				'label' => esc_html__( 'CSS Filters', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-tooltip-wrapper:hover img'
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'thumb_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-tooltip-wrapper img',
			]
		);
        
        $this->add_responsive_control(
			'thumb_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-tooltip-wrapper img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ), 
				'selector' => '{{WRAPPER}} .wpb-tooltip-wrapper img',
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'style_tooltip',
			[
				'label' => esc_html__( 'Tooltip', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'tooltip_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
					'#wpb-tooltip-popup.wpb-tooltip-{{ID}} h1' => 'color: {{VALUE}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h2' => 'color: {{VALUE}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h3' => 'color: {{VALUE}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h4' => 'color: {{VALUE}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h5' => 'color: {{VALUE}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h6' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Heading Typography', 'wpbits-addons-for-elementor' ),
				'name' => 'tooltip_heading_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h1,#wpb-tooltip-popup.wpb-tooltip-{{ID}} h2,#wpb-tooltip-popup.wpb-tooltip-{{ID}} h3,#wpb-tooltip-popup.wpb-tooltip-{{ID}} h4,#wpb-tooltip-popup.wpb-tooltip-{{ID}} h5,#wpb-tooltip-popup.wpb-tooltip-{{ID}} h6',
			]
		);
        
        $this->add_control(
			'tooltip_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'color: {{VALUE}};',
					'#wpb-tooltip-popup.wpb-tooltip-{{ID}}' . ' p' => 'color: {{VALUE}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}}' . ' a' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Text Typography', 'wpbits-addons-for-elementor' ),
				'name' => 'tooltip_text_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '#wpb-tooltip-popup.wpb-tooltip-{{ID}}, #wpb-tooltip-popup.wpb-tooltip-{{ID}} p'
			]
		);
        
        $this->add_control(
			'tooltip_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => 'rgba(0, 0, 0, 0.8)',
				'selectors' => [
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'background-color: {{VALUE}};border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'tooltip_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_control(
			'tooltip_max_width',
			[
				'label' => esc_html__( 'Maximum Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 10,
				'default' => 300,
                'selectors' => [
					'#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'max-width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'tooltip_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'tooltip_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tooltip_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '#wpb-tooltip-popup.wpb-tooltip-{{ID}}'
			]
		);
        
        $this->add_control(
			'tooltip_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'tooltip_h_margin',
			[
				'label' => esc_html__( 'Heading Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'tooltip_p_margin',
			[
				'label' => esc_html__( 'Paragraph Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();
        $url = $settings['website_link']['url'];
        $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
		
        ?>
        <div class="wpb-tooltip-wrapper" data-tpid="wpb-tooltip-<?php echo esc_attr($this->get_id()); ?> animated fast <?php echo esc_attr($settings['anim']); ?>" data-followmouse="<?php echo esc_attr($settings['follow_mouse']); ?>" data-motp="<?php echo esc_attr($settings['mouse_on_to_popup']); ?>" data-placement="<?php echo esc_attr($settings['placement']); ?>" data-smart="<?php echo esc_attr($settings['smart_placement']); ?>" data-offset="<?php echo esc_attr($settings['offset']); ?>">
        <?php
        if ($url) {
            $open_tag = '<a href="' . esc_url($url) . '" ' . $target . $nofollow . ' class="wpb-tooltip wpb-tooltip-type-' . sanitize_html_class($settings['content_type']) . '" data-powertip="' . esc_attr($settings['tooltip_content']) . '">';
            $close_tag = '</a>';
        } else {
            $open_tag = '<div class="wpb-tooltip wpb-tooltip-type-' . sanitize_html_class($settings['content_type']) . '" data-powertip="' . esc_attr($settings['tooltip_content']) . '">';
            $close_tag = '</div>';
        }
        echo $open_tag;
        if ($settings['content_type'] == 'icon') {
            \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
        } elseif ($settings['content_type'] == 'text') {
            echo $this->parse_text_editor($settings['text']);
        } elseif ($settings['content_type'] == 'image') {
			echo Group_Control_Image_Size::get_attachment_image_html( $settings );			
        } elseif ($settings['content_type'] == 'shortcode') {
            echo do_shortcode($settings['shortcode']);
        }
        echo $close_tag; ?>
        </div>
   <?php } 

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Tooltip() );