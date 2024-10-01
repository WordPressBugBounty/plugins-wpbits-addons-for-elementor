<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_WPBITS_AFE_Countdown extends Widget_Base {

	public function get_name() {
		return 'wpb-countdown';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Countdown', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}
    
    public function get_script_depends() {
		return [ 'wpb-countdown' ];
	}

	public function get_icon() {
		return 'eicon-countdown';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'countdown_content',
  			[
  				'label' => esc_html__( 'Countdown', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 

		$this->add_control(
			'due_date',
			[
				'label' => esc_html__( 'Due Date', 'wpbits-addons-for-elementor' ),
                'description' => sprintf( __( 'Date set according to your timezone: %s.', 'wpbits-addons-for-elementor' ), Utils::get_timezone_string() ),
                'default' => date( 'Y-m-d H:i', strtotime( '+1 month' ) + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);
        
        $this->add_control(
			'days_switcher',
			[
				'label' => esc_html__( 'Days', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Hide', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'days', [
				'label' => esc_html__( 'Days', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Days', 'wpbits-addons-for-elementor' ),
                'condition' => ['days_switcher' => 'yes'],
                'show_label' => false,
                'label_block' => true
			]
		);
        
        $this->add_control(
			'hours_switcher',
			[
				'label' => esc_html__( 'Hours', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Hide', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'hours', [
				'label' => esc_html__( 'Hours', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Hours', 'wpbits-addons-for-elementor' ),
                'condition' => ['hours_switcher' => 'yes'],
                'show_label' => false,
                'label_block' => true
			]
		);
        
        $this->add_control(
			'minutes_switcher',
			[
				'label' => esc_html__( 'Minutes', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Hide', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'minutes', [
				'label' => esc_html__( 'Minutes', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Minutes', 'wpbits-addons-for-elementor' ),
                'condition' => ['minutes_switcher' => 'yes'],
                'show_label' => false,
                'label_block' => true
			]
		);
        
        $this->add_control(
			'seconds_switcher',
			[
				'label' => esc_html__( 'Seconds', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Hide', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'seconds', [
				'label' => esc_html__( 'Seconds', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Seconds', 'wpbits-addons-for-elementor' ),
                'condition' => ['seconds_switcher' => 'yes'],
                'show_label' => false,
                'label_block' => true
			]
		);
        
        $this->add_control(
			'msg_expire',
			[
				'label' => esc_html__( 'Message After Expire', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_boxes_style',
			[
				'label' => esc_html__( 'Boxes', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'box_width',
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
					'{{WRAPPER}} .wpb-countdown > div' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'box_width_2',
			[
				'label' => esc_html__( 'Width (%)', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 10,
						'max' => 100,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div' => 'flex: 0 {{SIZE}}%;'
				],
			]
		);
        
        $this->add_responsive_control(
			'box_height',
			[
				'label' => esc_html__( 'Height', 'wpbits-addons-for-elementor' ),
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
					'{{WRAPPER}} .wpb-countdown > div' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'boxes_h_align',
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
					'{{WRAPPER}} .wpb-countdown' => 'justify-content: {{VALUE}};'
				],
                'toggle' => false
			]
		);
        
        $this->add_control(
			'boxes_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'box_bg',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-countdown > div',
			]
		);
        
        $this->add_control(
			'boxes_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div'
			]
		);
        
        $this->add_responsive_control(
			'box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div'
			]
		);
        
        $this->add_control(
			'boxes_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'box_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-countdown > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'box_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-countdown > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'content_layout',
			[
				'label' => esc_html__( 'Layout', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'v-layout',
				'options' => [
					'h-layout'  => esc_html__( 'Horizontal', 'wpbits-addons-for-elementor' ),
					'h-layout-reverse' => esc_html__( 'Horizontal Reverse', 'wpbits-addons-for-elementor' ),
                    'v-layout'  => esc_html__( 'Vertical', 'wpbits-addons-for-elementor' ),
					'v-layout-reverse' => esc_html__( 'Vertical Reverse', 'wpbits-addons-for-elementor' ),
				],
			]
		);

		$this->add_responsive_control(
			'horizontal_h_align',
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
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div' => 'justify-content: {{VALUE}};'
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'vertical_h_align',
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
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'content_layout',
                            'value' => 'v-layout',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'v-layout-reverse',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div' => 'align-items: {{VALUE}};'
				],
                'toggle' => false
			]
		);

        $this->add_control(
			'digits_heading',
			[
				'label' => esc_html__( 'Digits', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'digit_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.wpb-countdown-value' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'digit_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} span.wpb-countdown-value'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'digit_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} span.wpb-countdown-value',
			]
		);
        
        $this->add_control(
			'labels_heading',
			[
				'label' => esc_html__( 'Labels', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'label_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.wpb-countdown-label' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} span.wpb-countdown-label'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'label_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} span.wpb-countdown-label',
			]
		);
        
        $this->add_responsive_control(
			'label_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} span.wpb-countdown-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'msg_heading',
			[
				'label' => esc_html__( 'Message After Expire', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'msg_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown-msg' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'msg_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-countdown-msg'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'msg_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown-msg',
			]
		);

		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_days_style',
			[
				'label' => esc_html__( 'Days', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'days_bg',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-days',
			]
		);

		$this->add_control(
			'days_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_control(
			'days_digits',
			[
				'label' => esc_html__( 'Digits', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'days_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div.wpb-countdown-days > span.wpb-countdown-value' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'days_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} div.wpb-countdown-days span.wpb-countdown-value'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'days_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-days > span.wpb-countdown-value',
			]
		);

		$this->add_control(
			'days_labels',
			[
				'label' => esc_html__( 'Labels', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'days_label_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div.wpb-countdown-days > span.wpb-countdown-label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'days_label_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} div.wpb-countdown-days span.wpb-countdown-label'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'days_label_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-days > span.wpb-countdown-label',
			]
		);
   
		$this->end_controls_section();

		// section start
		$this->start_controls_section(
			'section_hours_style',
			[
				'label' => esc_html__( 'Hours', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'hours_bg',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-hours',
			]
		);

		$this->add_control(
			'hours_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_control(
			'hours_digits',
			[
				'label' => esc_html__( 'Digits', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'hours_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div.wpb-countdown-hours > span.wpb-countdown-value' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hours_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} div.wpb-countdown-hours span.wpb-countdown-value'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'hours_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-hours > span.wpb-countdown-value',
			]
		);

		$this->add_control(
			'hours_labels',
			[
				'label' => esc_html__( 'Labels', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'hours_label_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div.wpb-countdown-hours > span.wpb-countdown-label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hours_label_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} div.wpb-countdown-hours span.wpb-countdown-label'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'hours_label_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-hours > span.wpb-countdown-label',
			]
		);
   
		$this->end_controls_section();

		// section start
		$this->start_controls_section(
			'section_minutes_style',
			[
				'label' => esc_html__( 'Minutes', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'minutes_bg',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-minutes',
			]
		);

		$this->add_control(
			'minutes_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_control(
			'minutes_digits',
			[
				'label' => esc_html__( 'Digits', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'minutes_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div.wpb-countdown-minutes > span.wpb-countdown-value' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'minutes_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} div.wpb-countdown-minutes span.wpb-countdown-value'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'minutes_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-minutes > span.wpb-countdown-value',
			]
		);

		$this->add_control(
			'minutes_labels',
			[
				'label' => esc_html__( 'Labels', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'minutes_label_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div.wpb-countdown-minutes > span.wpb-countdown-label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'minutes_label_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} div.wpb-countdown-minutes span.wpb-countdown-label'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'minutes_label_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-minutes > span.wpb-countdown-label',
			]
		);
   
		$this->end_controls_section();

		// section start
		$this->start_controls_section(
			'section_seconds_style',
			[
				'label' => esc_html__( 'Seconds', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'seconds_bg',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-seconds',
			]
		);

		$this->add_control(
			'seconds_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_control(
			'seconds_digits',
			[
				'label' => esc_html__( 'Digits', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'seconds_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div.wpb-countdown-seconds > span.wpb-countdown-value' => 'color: {{VALUE}};'
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'seconds_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} div.wpb-countdown-seconds span.wpb-countdown-value'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'seconds_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-seconds > span.wpb-countdown-value',
			]
		);

		$this->add_control(
			'seconds_labels',
			[
				'label' => esc_html__( 'Labels', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'seconds_label_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-countdown > div.wpb-countdown-seconds > span.wpb-countdown-label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'seconds_label_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} div.wpb-countdown-seconds span.wpb-countdown-label'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'seconds_label_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-countdown > div.wpb-countdown-seconds > span.wpb-countdown-label',
			]
		);
   
		$this->end_controls_section();
	
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();
        ?>
        <div class="wpb-countdown <?php echo esc_attr($settings['content_layout']); ?>" data-duedate="<?php echo esc_attr($settings['due_date']); ?>">
            <?php if ($settings['days_switcher']) { ?>
            <div class="wpb-countdown-days">
                <span class="wpb-countdown-value">00</span><span class="wpb-countdown-label"><?php echo esc_html($settings['days']); ?></span>
            </div>
            <?php } ?>
            <?php if ($settings['hours_switcher']) { ?>
            <div class="wpb-countdown-hours">
                <span class="wpb-countdown-value">00</span><span class="wpb-countdown-label"><?php echo esc_html($settings['hours']); ?></span>
            </div>
            <?php } ?>
            <?php if ($settings['minutes_switcher']) { ?>
            <div class="wpb-countdown-minutes">
                <span class="wpb-countdown-value">00</span><span class="wpb-countdown-label"><?php echo esc_html($settings['minutes']); ?></span>
            </div>
            <?php } ?>
            <?php if ($settings['seconds_switcher']) { ?>
            <div class="wpb-countdown-seconds">
                <span class="wpb-countdown-value">00</span><span class="wpb-countdown-label"><?php echo esc_html($settings['seconds']); ?></span>
            </div>
            <?php } ?>
        </div>
        <?php if ($settings['msg_expire']) { ?>
        <div class="wpb-countdown-msg" style="display:none;"><?php echo esc_attr($settings['msg_expire']); ?></div>
        <?php } ?>
	<?php
    } 

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Countdown() );