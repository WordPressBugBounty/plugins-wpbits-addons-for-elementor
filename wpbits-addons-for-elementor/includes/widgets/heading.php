<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_WPBITS_AFE_Heading extends Widget_Base {

	public function get_name() {
		return 'wpb-heading';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Heading', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'heading_content',
  			[
  				'label' => esc_html__( 'Heading', 'wpbits-addons-for-elementor' )
  			]
		);

		$this->add_control(
			'heading_text',
			[
				'label' => esc_html__('Heading Text', 'wpbits-addons-for-elementor'),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your title', 'wpbits-addons-for-elementor' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'wpbits-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);  
 
		$this->add_control(
			'html_tag',
			[
				'label' => esc_html__( 'HTML Tag', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

        $this->add_control(
			'heading_icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS
			]
		);		

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '',
				],
				'separator' => 'before',
			]
		);

		
		$this->end_controls_section();

		// section start
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Heading', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading, {{WRAPPER}} .wpbits-heading a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .wpbits-heading',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .wpbits-heading',
			]
		);

		$this->add_control(
			'blend_mode',
			[
				'label' => esc_html__( 'Blend Mode', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}}' => 'mix-blend-mode: {{VALUE}}',
				],
				'condition' => ['gradient_heading' => '', 'rotate_switch' => ''],
				'separator' => 'none',
			]
		);
        
        $this->add_control(
			'flex_direction',
			[
				'label' => esc_html__( 'Before/After Layout', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'column' => esc_html__( 'Vertical', 'wpbits-addons-for-elementor' ),
                    'row' => esc_html__( 'Horizontal', 'wpbits-addons-for-elementor' )
				],
                'default' => 'column',
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading' => 'flex-direction: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
        
        $this->add_responsive_control(
			'justify',
			[
				'label' => esc_html__( 'Content Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
                'condition' => ['flex_direction' => 'row'],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading' => 'justify-content: {{VALUE}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Text Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '', 
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading' => 'text-align: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'hr_heading_1',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'max_width',
			[
				'label' => esc_html__( 'Maximum Width', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'hr_heading_2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'gradient_heading',
			[
				'label' => esc_html__( 'Gradient Heading', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'gradient_heading_bg',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .wpbits-heading',
				'condition' => ['gradient_heading' => 'yes'],
			]
		);

		$this->add_control(
			'hr_heading_3',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'rotate_switch',
			[
				'label' => esc_html__( 'Rotate Text', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_responsive_control(
			'text_rotate',
			[
				'label' => esc_html__( 'Rotate', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'condition' => ['rotate_switch' => 'yes'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 360,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 180,
				],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading' => 'writing-mode: vertical-rl;transform: rotate({{SIZE}}deg);'
				],
			]
        );
		

		$this->add_control(
			'hr_heading_4',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'overflow',
			[
				'label' => esc_html__( 'Overflow', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading' => 'overflow: visible;'
				],				
			]
		);

        $this->end_controls_section();

		// section start
		$this->start_controls_section(
			'section_title_style_dual',
			[
				'label' => esc_html__( 'Secondary Heading', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'important_note',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => __( 'Use &lt;em&gt;&lt;/em&gt; HTML tags to mark a part of the heading text as a secondary heading. Ex: Sample &lt;em&gt;Heading&lt;/em&gt; Text', 'plugin-name' ),
				'separator' => 'after',
			]
		);

		$this->add_control(
			'title_color_dual',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading em' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_dual',
				'selector' => '{{WRAPPER}} .wpbits-heading em',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_dual',
				'selector' => '{{WRAPPER}} .wpbits-heading em',
			]
		);

        $this->add_responsive_control(
			'padding_dual',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading em' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->add_responsive_control(
			'margin_dual',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading em' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'hr_heading_2_dual',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'heading_bg_dual',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .wpbits-heading em',
			]
		); 
		$this->end_controls_section();


		// section start
		$this->start_controls_section(
			'section_title_style_marker',
			[
				'label' => esc_html__( 'Marker', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'important_note_marker',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => __( 'Use &lt;mark&gt;&lt;/mark&gt; HTML tags to mark a part of the heading text. Ex: Sample &lt;mark&gt;Heading&lt;/mark&gt; Text', 'plugin-name' ),
				'separator' => 'after',
			]
		);


        $this->add_control(
            'marker_style' ,
            [
                'label'        => esc_html__( 'Select a Marker','wpbits-addons-for-elementor' ), 
                'type'         => Controls_Manager::SELECT,
                'options'      => array( 
                                    "1" => "1",
                                    "2" => "2",
                                    "3" => "3", 
									"4" => "4", 
									"5" => "5", 
                                ),
                'default'      => '1'
            ]
        );

        $this->add_control(
			'marker_color',
			[
				'label' => esc_html__( 'Marker Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} mark svg g' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		
		// section start
		$this->start_controls_section(
			'section_line1_style',
			[
				'label' => esc_html__( 'Before', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'line1_width',
			[
				'label' => esc_html__( 'Width', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
                    '%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:before' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'line1_height',
			[
				'label' => esc_html__( 'Height', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:before' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'line1_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:before' => 'background: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'line1_align',
			[
				'label' => esc_html__( 'Alignment', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'flex-start' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
					'center' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
                    'flex-end' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
				],
                'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:before' => 'align-self: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
        
        $this->add_responsive_control(
			'line1_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'line1_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:before' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'line1_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpbits-heading:before',
			]
		);

		$this->end_controls_section();	
        
        // section start
		$this->start_controls_section(
			'section_line2_style',
			[
				'label' => esc_html__( 'After', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'line2_width',
			[
				'label' => esc_html__( 'Width', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
                    '%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:after' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'line2_height',
			[
				'label' => esc_html__( 'Height', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:after' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'line2_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:after' => 'background: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'line2_align',
			[
				'label' => esc_html__( 'Alignment', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'flex-start' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
					'center' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
                    'flex-end' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
				],
                'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:after' => 'align-self: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
        
        $this->add_responsive_control(
			'line2_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'line2_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading:after' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'line2_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpbits-heading:after',
			]
		);

		$this->end_controls_section();
			


		// section start
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);        		
       
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 18,
				],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpbits-heading-icon svg' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
		
		$this->add_responsive_control(
			'heading_icon_position',
			[
				'label' => __( 'Icon Position', 'wpbits-afe-pro' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'wpbits-afe-pro' ),
						'icon' => 'eicon-h-align-left',
					],					
					'top' => [
						'title' => __( 'Top', 'wpbits-afe-pro' ),
						'icon' => 'eicon-v-align-top',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'wpbits-afe-pro' ),
						'icon' => 'eicon-v-align-bottom',
					],
					'right' => [
						'title' => __( 'Right', 'wpbits-afe-pro' ),
						'icon' => 'eicon-h-align-right',
					],										
				],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading-with-icon' => 'flex-direction: {{VALUE}}',
				],
				'selectors_dictionary' => [
					'top' => 'column',
					'left' => 'row',
					'bottom' => 'column-reverse',
					'right' => 'row-reverse'
				]
			]
		);



        $this->add_responsive_control(
            'icon_min_width',
            [
                'label' => esc_html__( 'Minimum Width', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'rem', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpbits-heading-icon' => 'min-width: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_min_height',
            [
                'label' => esc_html__( 'Minimum Height', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'rem', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpbits-heading-icon' => 'min-height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};'
                ],
            ]
        ); 		

        $this->add_responsive_control(
			'heading_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->add_responsive_control(
			'heading_icon_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-heading-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'heading_icon_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpbits-heading-icon'
			]
		);
        
        $this->add_control(
			'heading_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading-icon' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'heading_icon_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpbits-heading-icon'
			]
		);

        $this->start_controls_tabs( 'tabs_button_style' );
        
        $this->start_controls_tab(
			'section_icon_tab',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpbits-heading-icon svg path' => 'fill: {{VALUE}};',
				]
			]
		);


        $this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpbits-heading-icon' => 'background-color: {{VALUE}};' 
				]
			]
		);
	
		
        $this->end_controls_tab();

		$this->start_controls_tab(
			'icon_tab_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}}:hover .wpbits-heading-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}}:hover .wpbits-heading-icon svg path' => 'fill: {{VALUE}};',
				]
			]
		);


        $this->add_control(
			'icon_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .wpbits-heading-icon' => 'background-color: {{VALUE}};' 
				]
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();
		$this->end_controls_section();
		



	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();

		if ( '' === $settings['heading_text'] ) {
			return;
		}
		
		$allowed_tags = array(
			'strong' => array(),
			'b' => array(),
			'u' => array(),
			'i' => array(),
			'mark' => array(),
			'span' => array(),
			'em' => array(),			
			'a' => array(
				'href' => array(),
				'target' => array()
			)
		);

		$heading_output = wp_kses($settings['heading_text'], $allowed_tags);

		// marker
		if( strpos($heading_output,"<mark") > -1 ){
			$marker_style = is_numeric($settings["marker_style"]) && $settings["marker_style"] > 0 && $settings["marker_style"] <= 5 ? intval($settings["marker_style"]) : 1;

			$marker_svg = file_get_contents( WPBITS_AFE_PLUGINS_URL . 'assets/img/marker-' . $marker_style .".svg" );
			$marker_svg = str_replace('<svg ','<svg preserveAspectRatio="none" ',$marker_svg);

			$heading_output = str_replace("</mark>",$marker_svg."</mark>",$heading_output);
			$this->add_render_attribute( 'heading_text', 'class', "wpbits-heading wpbits-marker wpbits-marker-".$marker_style );
		}else{
			$this->add_render_attribute( 'heading_text', 'class', "wpbits-heading" );
		}

		

		if ($settings['gradient_heading'] === 'yes') {
			$this->add_render_attribute( 'heading_text', 'class', "wpbits-gradient-heading" );
		}

		// link
		if ( ! empty( $settings['link']['url'] ) ) {

			$this->add_render_attribute( 'url', 'href', esc_url($settings['link']['url']) );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'url', 'target', '_blank' );
			}

			if ( ! empty( $settings['link']['nofollow'] ) ) {
				$this->add_render_attribute( 'url', 'rel', 'nofollow' );
			}

			$heading_output = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $heading_output );
		}


		if( isset( $settings["heading_icon"] ) ){
			ob_start();
			\Elementor\Icons_Manager::render_icon( $settings["heading_icon"], [ 'aria-hidden' => 'true' ] );
			$icon = ob_get_contents();
			ob_end_clean(); 
		}else{
			$icon = "";
		}
 

		// heading tag
		if( ! empty( $icon ) ){
			printf( '<div class="wpbits-heading-with-icon"><div class="wpbits-heading-icon">%4$s</div><%1$s %2$s><span>%3$s</span></%1$s></div>', Utils::validate_html_tag($settings['html_tag']), $this->get_render_attribute_string( 'heading_text' ), $heading_output, $icon );
		}else{
			printf( '<%1$s %2$s><span>%3$s</span></%1$s>', Utils::validate_html_tag($settings['html_tag']), $this->get_render_attribute_string( 'heading_text' ), $heading_output );			
		}
			
	} 

}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Heading() );